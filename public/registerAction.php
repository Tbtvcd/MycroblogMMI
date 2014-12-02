<?php
if(isset($_POST['inputLogin']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['confirmPassword'])) {
    require '../config/databaseCredentials.php';

    $db =  new mysqli($dbc['host'], $dbc['user'], $dbc['password'], $dbc['dbName']);
}