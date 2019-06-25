import time, sys, os, serial, re

locations=['/dev/ttyUSB2','/dev/ttyUSB1','/dev/ttyUSB0']
print("Initializing...")
baud=400000
delim="_"
datafolder=os.path.dirname(os.path.abspath(__file__))+"/data/"
def writeData(value,type):
    f=open(+type,"w")
    f.write(value) 
    f.close()
def processData(raw):
    if raw == "":
        print("No Data")
        return
    try:
        data=raw.decode("utf-8".strip()).lower()
    except Exception as e:
        print("Decode Error: "+str(e)+"\n")
        exit()
    if data.startswith("dist_"):
        dist=data[5:].strip()
        print("DISTANCE: "+dist)
        writeData(dist,"dist")
        return dist
    print(data)
     
def scan():
    time.sleep(1)
    print("Scanning...\n")
    found=False
    I=0
    faildevice=""
    while found==False:
        for device in locations:
            I+=1
            try:
                time.sleep(0.05)
                print("Attempt "+str(I)+": "+device+": ???",end="\r")
                ser=serial.Serial(device, baud)
                ser.close()
                time.sleep(0.05)
                break
            except Exception as e:
                time.sleep(0.05)
                faildevice=device
                print("Attempt "+str(I)+": "+device+": [✗]",end="\r")
                #print(e)
                time.sleep(0.15)
        if faildevice != device:
            found=True;
            print("Attempt "+str(I)+": "+device+": [✓]",end="\r")
            break
        time.sleep(0.05)
        print("None found, retrying..             ",end="\r")
        time.sleep(1)
    else:
        found=False
    return device
    
device=scan()
print("Establishing connection on port "+device,end="\r")
ser=serial.Serial(device, baud)
print("Established connection on port  "+device,end="\r")
print("\nAwaiting activity",end="\n")
input=""
while True:
    ser.write(re.sub('\W', '', open(os.path.dirname(os.path.abspath(__file__))+"/data/web.in","r").read().rstrip("\n\r").replace("\n","")).strip().encode("utf-8"))
    try: 
        bytes=ser.readline()
    except Exception as e:
        print("Readline fail: "+str(e))
        try:
            ser.close()
        except:
            print("Failed to close lol")
        scan()
    print("Sending queued data")
    

    
    
    print("Data recieved, processing")
    processData(bytes)
