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
        wifi_list = []
        os.popen('sudo nmcli device wifi rescan')
        sleep 2
        shelllist = os.popen('nmcli --fields SSID device wifi').read().splitlines()
        for ssid in shelllist:
            if ssid.strip() == '--':
                continue
            else:
                wifi_list.append(ssid.strip())
        del(wifi_list[0])
        return json.dumps(wifi_list)

    def set_wifi(self, ssid, password):
        s = ssid
        p = password

        wireless = Wireless()
        wireless
        testwifi = wireless.connect(ssid=s, password=p)
        if testwifi:
            return 'success'
        else:
            print(testwifi)
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
