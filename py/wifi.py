import os
import sys
import base64
import json
from wireless import Wireless 
from paos_iot import *

wifi_cli = wifi()
try:
    str(sys.argv[1])
    print(wifi_cli.set_wifi(sys.argv[1],sys.argv[2]))
except:
    print(wifi_cli.get())
            
