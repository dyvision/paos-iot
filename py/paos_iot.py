import sys
import json
import base64
import requests
import urllib
import xml.etree.ElementTree as tree
import os
import sounddevice
from wireless import Wireless



class wifi:
    def get(self):
        shelllist = os.popen('nmcli --fields SSID device wifi').read().strip().splitlines()
        return json.dumps(shelllist)

    def set_wifi(self, ssid, password):
        s = ssid
        p = str(base64.b64decode(password).decode('ascii'))

        wireless = Wireless()
        wireless
        testwifi = wireless.connect(ssid=s, password=p)
        if testwifi:
            return 'success'
        else:
            return 'failure'

class audio:
    def get_device(self):
        return
    def set_device(self, device):
        return
    def set_volume(self, direction,value):
        return

class display:
    def get_device(self):
        return
    def set_device(self, device):
        return
    def resolution(self, resolution):
        return

class commands:
    def kill_session(self):
        return
