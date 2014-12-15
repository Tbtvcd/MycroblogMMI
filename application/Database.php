<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 15/12/14
 * Time: 15:03
 */

class Database {

    // Attributs de la classe
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'mycroblog';


    private $db;

    public function __construct() {
        $this->db = new mysqli($this->server, $this->user, $this->password, $this->dbName);
    }

    public function saveUser($login, $password, $email) {
        $this->db->query("INSERT INTO users (email, login, password) VALUES ('". $email ."', '". $login ."', '". $password ."')");
    }

    public function getUserFrom($login, $password) {
        try {
            $result = $this->db->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
            return $result->fetch_object();

        } catch(Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
} 