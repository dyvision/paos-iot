import sys
from paos_iot import *

audio_cli = audio()
try:
    if str(sys.argv[1]) == 'volume':
        print(audio_cli.set_volume(sys.argv[2],sys.argv[3]))
    elif str(sys.argv[1]) == 'scan':
        print(audio_cli.get_device())
    elif str(sys.argv[1]) == 'set':
        print(audio_cli.set_device(sys.argv[2]))
except:
    print('error')