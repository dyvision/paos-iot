import sys
import bluetooth
#from paos_iot import blue

device = '98:7A:14:B0:C9:C5'

#blue_cli = blue()
#try:
#    str(sys.argv[1])
#    if str(sys.argv[1]) == 'connect':
#        print(blue_cli.set(sys.argv[2]))
#    else:
#        print(blue_cli.delete_device(sys.argv[2]))
#except:
#    print(blue_cli.get())
try:
    s = bluetooth.BluetoothSocket(bluetooth.RFCOMM)
    s.connect((device,1))
except bluetooth.btcommon.BluetoothError as err:
    # Error handler
    pass