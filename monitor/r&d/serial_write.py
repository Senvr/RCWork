import serial, os, time
#Define shit
baud=115200
recieved = False
locations=['/dev/ttyUSB0','/dev/ttyUSB1','/dev/ttyUSB2']
faildevice="cock"
found=False

#Init Connection
while found==False:
    print("\n")
    for device in locations:
        try:
            print("Trying "+device,end="..")
            ser = serial.Serial(device, baud)
            break
        except:
            faildevice=device
            print("FAIL")
    if faildevice != device:
         print("\nGood 2 go on "+device)
         found=True
    else:
         print("Didn't find shit, looping again")
         found=False
         time.sleep(1);


#Loop for data
while True:
    serInRaw=ser.readline().strip()
    input=input("ass")
ser.close() #Wwe shouldnt get here but incase there's a break or something it'd still close like a good little noogy


