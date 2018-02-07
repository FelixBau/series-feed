<?php
    function get_mysql() {
        $mysqli = new mysqli('localhost', 'root', '', 'series-feed');
        $mysqli->set_charset("utf8");
        return $mysqli;
    }

    // Benutzer
    function get_user($key, $value) {
        return get_mysql()->query("select * from users where $key='$value' LIMIT 1")->fetch_assoc();
    }

    function get_users() {
        return get_mysql()->query("select * from users");
    }

    function set_last_login($key, $value) {
        $millis = round(microtime(true) * 1000);
        get_mysql()->query("UPDATE users SET last_login='$millis' WHERE $key='$value'");
    }

    function delete_profile($key, $value) {
        get_mysql()->query("delete from users where $key='$value'");
    }

    // Gruppen
    function get_group($key, $value) {
        return get_mysql()->query("select * from groups where $key='$value'")->fetch_assoc();
    }

    function get_groups() {
        return get_mysql()->query("select * from groups");
    }

    function add_group($name, $perm_level) {
        return get_mysql()->query("insert into groups (name, perm_level) values ('$name', '$perm_level')") != null;
    }

    function delete_group($key, $value) {
        get_mysql()->query("delete from groups where $key='$value'");
    }

    // Streamingdienste
    function get_streaming_services() {
        return get_mysql()->query("select * from streaming_services");
    }

    function get_streaming_service($key, $value) {
        return get_mysql()->query("select * from streaming_services where $key='$value'")->fetch_assoc();
    }

    function get_available_series($serviceid) {
        return get_mysql()->query("select * from series_on_services where serviceid='$serviceid'");
    }

    // Serien
    function get_all_series() {
        return get_mysql()->query("select * from series_data");
    }

    function get_series($key, $value) {
        return get_mysql()->query("select * from series_data where $key='$value'")->fetch_assoc();
    }

    function delete_series($key, $value) {
        get_mysql()->query("delete from series_data where $key='$value'");
    }

    function most_clicks() {
        return get_mysql()->query("select * from series_data order by clicks desc")->fetch_assoc();
    }

    function get_ratings($series_id) {
        $result = get_mysql()->query("select count(*) from ratings where seriesid='$series_id'")->fetch_assoc();
        return $result['count(*)'];
    }

    // Produktionsfirmen
    function get_producers() {
        return get_mysql()->query("select * from producers");
    }

    function get_producer($key, $value) {
        return get_mysql()->query("select * from producers where $key='$value'")->fetch_assoc();
    }

    // Search
    function search_database($text) {
        $sql = "select * from series_data where name like '%$text%' or genre like '%$text%'";
        return get_mysql()->query($sql);
    }

    // Click
    function click_series($key, $value) {
        $sql = "update series_data set clicks = clicks + 1 where $key='$value'";
        get_mysql()->query($sql);
    }

    // Login
    function login($username, $password)
    {
        $result = 0;
        $user = get_user('username', $username);
        if($user == null) return false;
        if($user['password'] == $password){
            $result = 1; // Login erfolgreich
        } else {
            $result = 0; // Passwort falsch
        }

        if($user['account_status'] == 1) {
            set_last_login('id', $user['id']);
            $result = 1; // Login erfolgreich    
        } else if($user['account_status'] == 0) {
            $result = 2; // Account gesperrt
        } else if($user['account_status'] == 2) {
            $result = 3; // Account nicht bestätigt
        }
        return $result;
    }

    // Register
    function register($username, $mail_address, $password) {
        return get_mysql()->query("INSERT INTO users (username, password, email, account_status, group_id) VALUES ('$username', '$password', '$mail_address', '2', '1')");
    }

    // Account status
    function get_account_status($status_id)
    {
        switch($status_id)
        {
            case 0:
                return "<span class='text-danger'><strong>Account gesperrt</strong></span>";
                break;
            case 1:
                return "<span class='text-success'><strong>Account aktiv</strong></span>";
                break;
            case 2:
                return "<span class='text-warning'><strong>Account nicht best&auml;tigt</strong></span>";
                break;
        }
    }

    // Date (format)
    function get_date($millis) {
        if($millis == 0) {
            return "Noch kein Login";
        }
        return date("d.m.Y H:i", $millis / 1000);
    }
?>