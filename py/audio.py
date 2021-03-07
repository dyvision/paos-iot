import os
import sys
import base64
import json
from wireless import Wireless 
from paos_iot import *

audio_cli = audio()
try:
    str(sys.argv[1])
    if str(sys.argv[1]) == 'volume':
        print(audio_cli.set_volume(sys.argv[2],sys.argv[3]))
    else:
        print(audio_cli.set_device(sys.argv[2]))
except:
    print(audio_cli.get_device())
            
