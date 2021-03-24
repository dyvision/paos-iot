import sys
from paos_iot import *

audio_cli = audio()
try:
    str(sys.argv[1])
    if str(sys.argv[1]) == 'volume':
        print(audio_cli.set_volume(sys.argv[2],sys.argv[3]))
    elif str(sys.argv[1] == 'scan'):
        print(audio_cli.get_device())
    else:
        print(audio_cli.set_device(sys.argv[3]))
except:
    print('error')