import sys
import bluetooth
#from paos_iot import blue

#blue_cli = blue()
#try:
#    str(sys.argv[1])
#    if str(sys.argv[1]) == 'connect':
#        print(blue_cli.set(sys.argv[2]))
#    else:
#        print(blue_cli.delete_device(sys.argv[2]))
#except:
#    print(blue_cli.get())

hostMACAddress = '98:7A:14:B0:C9:C5' 
port = 3
backlog = 1
size = 1024
s = bluetooth.BluetoothSocket(bluetooth.RFCOMM)
s.bind((hostMACAddress, port))
s.listen(backlog)
try:
    client, clientInfo = s.accept()
    while 1:
        data = client.recv(size)
        if data:
            print(data)
            client.send(data) # Echo back to client
except: 
    print("Closing socket")
    client.close()
    s.close()