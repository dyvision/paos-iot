import sys
import json
import base64
import requests
import urllib
import xml.etree.ElementTree as tree
import os
import sounddevice
import time
from subprocess import call
from wireless import Wireless


class wifi:
    def get(self):
        wifi_list = []
        os.popen('sudo nmcli device wifi rescan')
        time.sleep(2)
        shelllist = os.popen(
            'nmcli --fields SSID device wifi').read().splitlines()
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
            return '{"message":"success"}'
        else:
            return '{"message":"failure"}'


class audio:
    def get_device(self):
        device_list = []
        shelllist = os.popen('pactl list short sources').read().splitlines()
        for device in shelllist:
            stringarray = []
            stringarray = device.split('\t')
            device_list.append(stringarray[1].strip())
            
        result = device_list

        return json.dumps(result)

    def set_device(self, device):
        os.popen('pacmd set-default-source '+device)
        return

    def set_volume(self, direction, value):
        if direction == 'up':
            direct = '+'
        else:
            direct = '-'
        call(["amixer", "-D", "pulse", "sset", "Master", value+"%"+direct])
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
