<?php
    // Methode um MySQL Verbindung herzustellen
    function get_mysql() {
        $mysqli = new mysqli('localhost', 'root', '', 'series-feed');
        $mysqli->set_charset("utf8");
        return $mysqli;
    }

    /*  
        BENUTZER
    */
    // Methode um einen bestimmten Benutzer aus der Datenbank auszulesen, variable Feldersuche mit key - value
    function get_user($key, $value) {
        return get_mysql()->query("SELECT * FROM users WHERE $key='$value' LIMIT 1")->fetch_assoc();
    }

    // Methode um alle Benutzer aus der Datenbank auszulesen 
    function get_users() {
        return get_mysql()->query("SELECT * FROM users");
    }

    // Methode um den letzten Login eines Benutzers in die Datenbank zu schreiben
    function set_last_login($key, $value) {
        $millis = round(microtime(true) * 1000);
        get_mysql()->query("UPDATE users SET last_login='$millis' WHERE $key='$value'");
    }

    // Methode um einen Benutzer aus der Datenbank zu löschen
    function delete_profile($key, $value) {
        get_mysql()->query("DELETE FROM users WHERE $key='$value'");
    }

    /*  
        Gruppen
    */
    // Methode um eine bestimmte Gruppe aus der Datenbank auszulesen, variable Feldersuche mit key - value 
    function get_group($key, $value) {
        return get_mysql()->query("SELECT * FROM groups WHERE $key='$value'")->fetch_assoc();
    }

    // Methode um alle Gruppen aus der Datenbank auszulesen
    function get_groups() {
        return get_mysql()->query("SELECT * FROM groups");
    }

    // Methode um eine Gruppe in die Datenbank zu speichern
    function add_group($name, $perm_level) {
        return get_mysql()->query("INSERT INTO groups (name, perm_level) VALUES ('$name', '$perm_level')");
    }

    // Methode um eine Gruppe aus der Datenbank zu löschen
    function delete_group($key, $value) {
        get_mysql()->query("DELETE FROM groups WHERE $key='$value'");
    }

    /*  
        Streamingdienste
    */
    // Methode um alle Streamingdienste aus der Datenbank auszulesen
    function get_streaming_services() {
        return get_mysql()->query("SELECT * FROM streaming_services");
    }

    // Methode um einen bestimmten Streamingdienste aus der Datenbank auszulesen, variable Feldersuche mit key - value 
    function get_streaming_service($key, $value) {
        return get_mysql()->query("SELECT * FROM streaming_services WHERE $key='$value'")->fetch_assoc();
    }

    // Methode um alle verfügbaren Serien bei einem bestimmten Streamingdienste aus der Datnebank auszulesen
    function get_available_series($serviceid) {
        return get_mysql()->query("SELECT * FROM series_on_services WHERE serviceid='$serviceid'");
    }

    // Methode um einen Streamingdienst in die Datenbank einzufügen
    function add_service($name, $website_link, $price_string) {
        get_mysql()->query("INSERT INTO streaming_services (name, website_link, price_string) VALUES ('$name', '$website_link', '$price')");
    }

    // Methode um einen Streamingdienst aus der Datenbank zu löschen
    function delete_service($key, $value) {
        get_mysql()->query("DELETE FROM streaming_services WHERE $key='$value'");
    }

    /*  
        Serien
    */
    // Methode um alle Serien aus der Datenbank auszulesen
    function get_all_series() {
        return get_mysql()->query("SELECT * FROM series_data");
    }

    // Methode um eine bestimmte Serien aus der Datenbank auszulesen, variable Feldersuche mit key - value 
    function get_series($key, $value) {
        return get_mysql()->query("SELECT * FROM series_data WHERE $key='$value'")->fetch_assoc();
    }

    // Methode um eine bestimmte Serie aus der Datenbank zu löschen, variable Feldersuche mit key - value
    function delete_series($key, $value) {
        get_mysql()->query("DELETE FROM series_data WHERE $key='$value'");
    }

    // Methode um die Serie mit den meisten Clicks aus der Datenbank auszulesen
    function most_clicks() {
        return get_mysql()->query("SELECT * FROM series_data ORDER BY clicks DESC LIMIT 1")->fetch_assoc();
    }

    // Methode um eine Serie in die Datenbank einzufügen
    function add_series($name, $producerid, $seasons, $episodes, $genre) {
        get_mysql()->query("INSERT INTO series_data (name, producerid, seasons, episodes, genre) VALUES ('$name', '$producerid', '$seasons', '$episodes', '$genre')");
    }

    /*  
        Produktionsfirmen
    */
    // Methode um alle Produktionsfirmen aus der Datenbank auszulesen
    function get_producers() {
        return get_mysql()->query("SELECT * FROM producers");
    }

    // Methode um eine bestimmte Produktionsfirma aus der Datenbank auszulesen, variable Feldersuche mit key - value
    function get_producer($key, $value) {
        return get_mysql()->query("SELECT * FROM producers WHERE $key='$value'")->fetch_assoc();
    }

    // Methode um eine Produktionsfirma in die Datenbank einzufügen
    function add_producer($name) {
        get_mysql()->query("INSERT INTO producers (name) VALUES ('$name')");
    }

    // Methode um eine Produktionsfirma aus der Datenbank zu löschen
    function delete_producer($key, $value) {
        get_mysql()->query("DELETE FROM producers WHERE $key='$value'");
    }

    /*  
        Ratings
    */
    // Methode um alle bestimmten Bewertungen aus der Datenbank auszulesen, variable Feldersuche mit key - value
    function get_ratings($key, $value) {
        return get_mysql()->query("SELECT * FROM ratings WHERE $key='$value'");
    }

    // Methode um eine bewertung in die Datenbank einzufügen
    function add_rating($seriesid, $userid, $stars, $text) {
        $milliseconds = round(microtime(true) * 1000);
        get_mysql()->query("INSERT INTO ratings (seriesid, userid, stars, text, rating_date) VALUES ('$seriesid', '$userid', '$stars', '$text', '$milliseconds')");
    }

    // Methode um die Anzahl der Bewertungen aus der Datenbank auszulesen
    function most_ratings() {
        return get_mysql()->query("SELECT seriesid, avg(stars) AS seriesAvg FROM ratings GROUP BY seriesid")->fetch_assoc();
    }

    // Methode um die Anzahl der Bewertungen einer Serie aus der Datenbank auszulesen
    function count_ratings($series_id) {
        $result = get_mysql()->query("SELECT count(*) FROM ratings WHERE seriesid='$series_id'")->fetch_assoc();
        return $result['count(*)'];
    }

    // Methode um zu prüfen, ob eine Benutzer schon eine Serie bewertet hat
    function has_rated($seriesid, $userid) {
        $result = get_mysql()->query("SELECT userid FROM ratings WHERE userid='$userid' and seriesid='$seriesid'")->fetch_assoc();
        return $result['userid'] != null;
    }

    // Methode um die Suchfunktion bereitzustellen, Suche in name und genre
    function search_database($text) {
        $sql = "SELECT * FROM series_data WHERE name LIKE '%$text%' OR genre LIKE '%$text%'";
        return get_mysql()->query($sql);
    }

    // Methode um die Clickzahl einer Serie um 1 zu erhöhen
    function click_series($key, $value) {
        $sql = "UPDATE series_data SET clicks = clicks + 1 WHERE $key='$value'";
        get_mysql()->query($sql);
    }

    // Login-Funktion mit Account-Status Prüfung
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

    // Register-Funktion zum registrieren eines neuen Benutzers
    function register($username, $mail_address, $password) {
        return get_mysql()->query("INSERT INTO users (username, password, email, account_status, group_id) VALUES ('$username', '$password', '$mail_address', '1', '1')");
    }

    // Formatierung eines gegebenen Account-Status
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

    // Hilfsfunktion zur Formatierung von Millisekunden in das deutsche Zeitformat
    function get_date($millis) {
        if($millis == 0) {
            return "Noch kein Login";
        }
        return date("d.m.Y H:i", $millis / 1000);
    }
?>