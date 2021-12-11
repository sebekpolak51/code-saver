<?php
    function dbconnect(){
        $db_server = 'localhost';
        $db_user = 'root';
        $db_password = '';

        $db_name = 'name';

        $conn = new mysqli($db_server, $db_user, $db_password, $db_name);

        return $conn;
    }
?>