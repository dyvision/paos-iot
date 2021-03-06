import sys
import bluetooth
from paos_iot import blue

blue_cli = blue()
try:
    str(sys.argv[1])
    if str(sys.argv[1]) == 'connect':
        print(blue_cli.set(sys.argv[2]))
    elif str(sys.argv[1]) == 'current':
        print(blue_cli.current())
    elif str(sys.argv[1]) == 'scan':
        print(blue_cli.get())
    else:
        print(blue_cli.delete_device(sys.argv[2]))
except:
    print('error')