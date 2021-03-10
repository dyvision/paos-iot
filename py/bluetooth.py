from paos_iot import *

blue_cli = paos_iot.blue()
try:
    str(sys.argv[1])
    if str(sys.argv[1]) == 'volume':
        print(blue_cli.get())
except:
    print(blue_cli.get())