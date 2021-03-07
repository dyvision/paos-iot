<?php

namespace paos_iot {
    //path constants
    const config_path = '/var/www/html/paos-iot/config.json';
    const session_path = '/var/www/html/paos-iot/session.json';
    const py_path = '/var/www/html/paos-iot/py/';

    //url constants
    const main_url = 'api.paos.io';

    //versioning
    const python = 'python3';

    class user
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
    class parsec
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
        function launch($session_id,$peer_id)
        {
            return shell_exec(python . ' ' . py_path . 'launch.py launch '.$session_id.' '.$peer_id);
        }
        function get($id,$guid)
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
            return shell_exec(python . ' ' . py_path . 'launch.py kill');
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
            $result = shell_exec('sudo ' . python . ' ' . py_path . 'wifi.py ' . $ssid . ' ' . $password);
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
        function __construct()
        {
            return;
        }
        function set_volume($direction, $value)
        {
            shell_exec(python . ' ' . py_path . 'audio.py volume ' . $direction . ' ' . $value);
            return;
        }
        function device_get()
        {
            return shell_exec(python . ' ' . py_path . 'audio.py');
        }
        function device_set($device)
        {
            shell_exec(python . ' ' . py_path . 'audio.py device ' . $device);
            return;
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
        function get()
        {
        }
        function device_get()
        {
        }
        function device_set()
        {
        }
        function resolution()
        {
        }
    }
    class commands
    {
        function __construct()
        {
            return;
        }
    }
}
