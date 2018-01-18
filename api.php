<?php
    function get_mysql() {
        $mysqli = new mysqli('localhost', 'root', '', 'series-feed');
        $mysqli->set_charset("utf8");
        return $mysqli;
    }
?>