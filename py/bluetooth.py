from paos_iot import *

blue_cli = bluez()
try:
    str(sys.argv[1])
    if str(sys.argv[1]) == 'volume':
        print(blue_cli.get())
    else:
        print(blue_cli.set_device(sys.argv[2]))
except:
    print(blue_cli.get())