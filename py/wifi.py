import os
import sys
import base64
import json
from wireless import Wireless 
from paos_iot import *

wifi_cli = wifi()
try:
    wifi_file = open('../wifi.json','r')
    if sys.argv[1] == 'resetwifi':
        Exception('resetting')
    else:
        cache = json.loads(wifi_file)
        wifi_cli.set_wifi(wifi_file['ssid'],wifi_file['password'])
except:
    try:
        str(sys.argv[1])
        print(wifi_cli.set_wifi(sys.argv[1],sys.argv[2]))
    except:
        print(wifi_cli.get())
            
