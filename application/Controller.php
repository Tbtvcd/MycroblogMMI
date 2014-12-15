<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 15/12/14
 * Time: 17:14
 */
require_once '../application/Viewer.php';
require_once '../application/Database.php';

class Controller {

    private $database;
    private $viewer;

    public function __construct() {
        $this->database = new Database();
        $this->viewer = new Viewer();
    }

    public function index() {

        if(isset($_SESSION['username'])) {
            $data = array(
                'username'   =>  $_SESSION['username'],
                'page_title' =>  'MycroBlog Home',
                'title'      =>  'MycroBlog');
        }

        else {
            $data = array();
        }

        $this->viewer->render('index.twig', $data);
    }

    public function register() {
        if(isset($_POST['inputLogin']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
            $this->database->saveUser($_POST['inputLogin'], $_POST['inputPassword'], $_POST['inputEmail']);
            $_SESSION['username'] = $_POST['inputLogin'];
            header('Location: /index');
        }

        else {
            $this->viewer->render('register.twig', array());
        }
    }

    public function login() {

        if(isset($_POST['inputLogin']) && isset($_POST['inputPassword']))
        {
            $user = $this->database->getUserFrom($_POST['inputLogin'], $_POST['inputPassword']);

            if($user) {
                $_SESSION['username'] = $user->login;
                header('Location: /index');
            }
        }

        if(isset($_SESSION['username'])) {
            $data = array('username' => $_SESSION['username']);
        }

        else {
            $data = array();
        }

        $this->viewer->render('login.twig', $data);
    }

    public function logout() {
        if(isset($_SESSION['username']))
            session_destroy();

        header('Location: /index');
    }
} 