function set_volume(direction, value) {
    var xmlhttp = new XMLHttpRequest();
    var body = JSON.stringify({ 'direction': direction, 'value': value });
    xmlhttp.open("PUT", "api/audio.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {}
    };
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