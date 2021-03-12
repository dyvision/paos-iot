function set_volume(direction, value) {
    var xmlhttp = new XMLHttpRequest();
    var body = JSON.stringify({ 'direction': direction });
    xmlhttp.open("PUT", "api/audio.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(body);
}

function kill_session() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("DELETE", "api/parsec.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {}
    };
    xmlhttp.send();
}

function power(option) {
    var xmlhttp = new XMLHttpRequest();
    var url = "api/power.php?option=" + option;
    if (document.getElementById(option).innerHTML.toLowerCase().indexOf("- starting...") === -1) {
        document.getElementById(option).innerHTML = document.getElementById(option).innerHTML + ' - starting...'
    } else {}
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function wifi(ssid, password) {
    var xmlhttp = new XMLHttpRequest();
    document.getElementById('connect').innerHTML = 'Connecting...'
    var body = JSON.stringify({ 'ssid': ssid, 'password': password });
    xmlhttp.open("POST", "api/wifi.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(body);
}