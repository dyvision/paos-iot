import os
import sys
import base64
import json
from wireless import Wireless 
from paos_iot import *

parsec_cli = commands()
try:
    str(sys.argv[1])
    if str(sys.argv[1]) == 'kill':
        print(parsec_cli.kill_session())
    else:
        print(parsec_cli.launch_session(sys.argv[2],sys.argv[3]))
except:
    print('You need to list a command type')
            
