<?php

namespace paos_iot {

    use Exception;

    //path constants
    const config_path = '/var/www/html/paos-iot/config.json';
    const session_path = '/var/www/html/paos-iot/session.json';
    const py_path = '/var/www/html/paos-iot/py/';

    //url constants
    const main_url = 'api.paos.io';

    //versioning
    const python = 'python3';

    class user //done
    {
        function __construct()
        {
            return;
        }
        function get($id, $guid)
        {
            //create auth header
            $context = stream_context_create([
                "http" => [
                    "header" => "Authorization: Basic " . base64_encode($id . ':' . $guid)
                ]
            ]);

            //user info api
            $url = 'https://' . main_url . '/api/user';

            //execute
            return file_get_contents($url, false, $context);
        }
        function login($id, $guid, $session_id, $user_id)
        {
            setcookie('id', $id, 0, '/');
            setcookie('guid', $guid, 0, '/');
            setcookie('session_id', $session_id, 0, '/');
            setcookie('user_id', $user_id, 0, '/');
        }
    }
    class parsec //done
    {
        function __construct()
        {
            return;
        }
        function session_cache($session_id, $user_id)
        {
            $session['session_id'] = $session_id;
            $session['user_id'] = $user_id;

            $file = fopen(session_path, 'w');
            fwrite($file, json_encode($session));
            fclose($file);
        }
        function launch($session_id, $peer_id)
        {
            return shell_exec('sudo -H -u parsec bash -c \'export DISPLAY=:0;sudo parsecd session_id=' . $session_id . ':peer_id=' . $peer_id . ':client_overlay=0:client_immersive=0:client_vsync=1\' > /dev/null 2>/dev/null &');
        }
        function get($id, $guid)
        {
            //create auth header
            $context = stream_context_create([
                "http" => [
                    "header" => "Authorization: Basic " . base64_encode($id . ':' . $guid)
                ]
            ]);

            //user info api
            $url = 'https://' . main_url . '/api/hosts';

            //execute
            return file_get_contents($url, false, $context);
        }
        function kill_session()
        {
            return shell_exec('sudo -H -u parsec bash -c \'sudo pkill parsec\'');
        }
        function update()
        {
            shell_exec('sudo service bluetooth restart');
            shell_exec('git reset --hard HEAD');
            shell_exec('git pull');
            shell_exec('chmod +x -R ' . py_path . '*');
            
            shell_exec('cd /home/parsec/paos-start/;git reset --hard HEAD;git pull;sudo chmod +x *;');
            shell_exec('sudo reboot');
            return;
        }
    }
    class settings
    {
        function __construct()
        {
            return;
        }
        function get()
        {
            return file_get_contents(config_path);
        }
    }
    class wifi //done
    {
        function __construct()
        {
            return;
        }
        function get()
        {
            return shell_exec(python . ' ' . py_path . 'wifi.py');
        }
        function get_cache()
        {
            $config = json_decode(file_get_contents(config_path), true);
            return $config['ssid'];
        }
        function connect($ssid, $password)
        {
            $result = shell_exec('sudo -H -u parsec bash -c \'sudo ' . python . ' ' . py_path . 'wifi.py ' . $ssid . ' ' . $password . '\'');
            shell_exec('sudo dhclient');
            return $result;
        }
        function save($ssid, $password)
        {
            $config = json_decode(file_get_contents(config_path), true);

            $config['ssid'] = $ssid;
            $config['wifi_password'] = $password;
            $config['wifi'] = true;

            $file = fopen(config_path, 'w');
            fwrite($file, json_encode($config));
            fclose($file);
        }
    }
    class audio //done
    {
        public $profiles;

        function __construct()
        {
            return;
        }
        function set_volume($direction)
        {
            if ($direction == 'up') {
                $direct = '+';
            } else {
                $direct = '-';
            }
            shell_exec('amixer -c 0 set Master 10%' . $direct);
            return;
        }
        function get_device()
        {
            return shell_exec(python . ' ' . py_path . 'audio.py scan');
        }
        function set_device($device)
        {
                return exec('sudo -H -u parsec bash -c \'sudo ' . python . ' ' . py_path . 'audio.py set ' . $device . '\'');
        }
        function save($device)
        {
            $config = json_decode(file_get_contents(config_path), true);

            $config['audio_device'] = $device;

            $file = fopen(config_path, 'w');
            fwrite($file, json_encode($config));
            fclose($file);
        }
        function get_cache()
        {
            $config = json_decode(file_get_contents(config_path), true);
            return $config['audio_device'];
        }
    }
    class display
    {
        function __construct()
        {
            return;
        }
        function get_resolution($type = null)
        {
            $result = ['720p' => '1280x720', '1080p' => '1920x1080', '2k' => '2560x1440', '4k' => '3840x2160'];
            return json_encode($result);
        }
        function set_resolution($size)
        {
            return shell_exec('export DISPLAY=:0;xrandr -s ' . $size);
        }
    }
    class blue
    {
        function __construct()
        {
            return;
        }
        function get()
        {
            return shell_exec(python . ' ' . py_path . 'blue.py scan');
        }
        function current()
        {
            return shell_exec(python . ' ' . py_path . 'blue.py current');
        }
        function set($device)
        {
            return shell_exec(py_path . 'bluetooth.sh ' . $device);
        }
        function delete($device)
        {
            return shell_exec(python . ' ' . py_path . 'blue.py disconnect ' . $device);
        }
    }
    class power{
        function __construct()
        {
            return;
        }
        function power_off(){
            shell_exec('sudo shutdown');
            return;
        }
        function reboot(){
            shell_exec('sudo reboot');
            return;
        }
    }
}
