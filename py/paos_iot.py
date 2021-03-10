import sys
import json
import base64
import requests
import urllib
import xml.etree.ElementTree as tree
import os
import time
import alsaaudio
import math
import bluetooth
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
        time.sleep(5)
        testwifi = wireless.connect(ssid=s, password=p)
        if testwifi:
            return '{"message":"success"}'
        else:
            return '{"message":"failure"}'


class audio:
    def get_device(self):
        device_list = []
        shelllist = os.popen(
            'pacmd list-cards | grep -E "output:" | grep -E ":analog-stereo"').read().splitlines()
        active_device = shelllist[-1]
        del(shelllist[-1])
        del(shelllist[0])
        for device in shelllist:
            stringarray = []
            stringarray = device.split(':')
            new_device = stringarray[0]+':'+stringarray[1]+':'+stringarray[2]
            device_list.append(new_device.strip())

        current_device = active_device.split(':', 1)
        result = {
            'active_device': current_device[1], "available_devices": device_list}

        return json.dumps(result)

    def set_device(self, device):
        os.popen('pacmd set-card-profile 0 '+device)
        return

    def set_volume(self, direction, value):
        value = int(value)
        if direction == 'up':
            direct = value
        else:
            direct = -value

        am = alsaaudio.Mixer()
        current_volume = am.getvolume()
        new_volume = min(current_volume[0] + direct, 100)
        am.setvolume(new_volume)
        return new_volume


class display:
    def get_device(self):
        return

    def set_device(self, device):
        return

    def resolution(self, resolution):
        return


class commands:
    def kill_session(self):
        os.popen('sudo pkill parsec')
        return

    def launch_session(self, session_id, peer_id):
        os.popen("export DISPLAY=:0;sudo parsecd session_id="+session_id +
                 ":peer_id="+peer_id+":client_overlay=0:client_immersive=0:client_vsync=1")
        return


class blue:
    def get(self):
        nearby_devices = bluetooth.discover_devices(lookup_names=True)
        return nearby_devices

    def set(self, device):
        return
