import sys
import json
import base64
import requests
import urllib
import xml.etree.ElementTree as tree
import os
import sounddevice
from wireless import Wireless
from gi.repository import NetworkManager, NMClient

gi.require_version('NetworkManager', '1.0')

class wifi:
    def get(self):
        wifi_list = []
        nmc = NMClient.Client.new()
        devs = nmc.get_devices()

        for dev in devs:
            if dev.get_device_type() == NetworkManager.DeviceType.WIFI:
                for ap in dev.get_access_points():
                    for ssid in ap.get_ssid():
                        wifi_list.append(ssid)
        return json.dumps(wifi_list)

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
