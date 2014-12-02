<?php
if(isset($_POST['inputLogin']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['confirmPassword'])) {
    require '../config/databaseCredentials.php';
    $db =  new mysqli($dbc['host'], $dbc['user'], $dbc['password'], $dbc['dbName']);

    $db->query("INSERT INTO users (email, login, password) VALUES ('". $_POST['inputEmail'] ."', '". $_POST['inputLogin'] ."', '". $_POST['inputPassword'] ."')");
    echo $db->error;
}