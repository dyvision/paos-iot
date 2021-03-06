import os
import sys
import base64
import json
from wireless import Wireless 
from paos_iot import *

wifi_cli = wifi()
try:
    wifi_file = open('../wifi.json','r')
    cache = json.loads(wifi_file)
    wifi_cli.set_wifi(wifi_file['ssid'],wifi_file['password'])
except:
    if sys.argv[1] is None:
        print(wifi_cli.get())
    else:
        print(wifi_cli.set_wifi(sys.argv[1],sys.argv[2]))
