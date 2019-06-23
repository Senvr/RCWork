import serial, os, time, random, sys, signal

baud=9600
#recieved = False
#locations=['/dev/ttyUSB0','/dev/ttyUSB1','/dev/ttyUSB2']
delim="_"
decoded=False

#time.sleep(1)
#print("Scanning...\n")
#found=False
#I=0
#faildevice=""
#while found==False:
#    for device in locations:
        #I+=1
        #try:
            #print(str(I)+"|"+device+": ?",end="\r")
            #ser=serial.Serial(device, baud)
#            
            #break
        #except:
            #faildevice=device
            #print(str(I)+"|"+device+": ✗",end="\r")
            #time.sleep(0.25);
    #if faildevice != device:
        #print(" ")
#        found=True;
        #print(device,end=": ✓")
        #print("Found")
#        
    #else:
        #found=False
ser=serial.Serial("/dev/ttyUSB0", baud)
def incomeEvent(raw):
    if raw == "":
        print("No Data")
        return
    try:
        data=raw.decode("utf-8".strip()).lower()
    except Exception as e:
        print("Decode Error: "+str(e)+"\n")
        exit()
    if data.startswith("ypr"):
        xyz=list(filter(None,data[3:].split("_")))
        x=xyz[0]
        y=xyz[1]
        z=xyz[2]
        print("Gyro",end="")
        print(xyz)
#        print("X: "+x)
#        print("Y: "+y)
#        print("Z: "+z)
        return xyz
    if data.startswith("areal"):
        areal=list(filter(None,data[3:].split("_")))
        velX=int(areal[1])
        velY=int(areal[2])
        velZ=int(areal[3])
        print("Vel",end="")
        print(areal)
#        print("X: "+str(velX))
#        print("Y: "+str(velY))
#        print("Z: "+str(velZ))
        speed=abs(round((abs(int((velX+velY+velZ))-1582474))/1000)-1581)
        print("Speed: "+str(speed))
        return areal
    if data.startswith("ms"):
       time=list(filter(None,data[3:].split("_")))
       ms=time[0];
       print("Time: ",end="")
       print(time)
       print("Time ran: "+ms)
       print(str(int(ms)/1000))
    if data.startswith("wait"):
       waittime=list(filter(None,data[3:].split("_")))
       print("WAIT, DO NOT MOVE",end=str(waittime[0])+"\n")
    if data.startswith("echo"):
       byte=list(filter(None,data[3:].split("_")))
       print(data)
    print("I don't know what to do with this: "+data)

print("Recording...")
while True:
    
    serInRaw=ser.readline().strip()
    recieved = True
    
    incomeEvent(serInRaw)
    
ser.close()
