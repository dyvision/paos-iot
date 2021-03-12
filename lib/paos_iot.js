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
    xmlhttp.open("DELETE", "api/parsec.php?option=" + option, true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {}
    };
    xmlhttp.send();
}

function wifi(ssid, password) {
    var xmlhttp = new XMLHttpRequest();
    var body = JSON.stringify({ 'ssid': ssid, 'password': password });
    xmlhttp.open("POST", "api/wifi.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {}
    };
    xmlhttp.send(body);
}