<?php
session_start();

if(isset($_POST['inputLogin']) && isset($_POST['inputPassword']))
{
    $username = $_POST['inputLogin'];
    $password = $_POST['inputPassword'];

    require '../config/databaseCredentials.php';
    $db =  new mysqli($dbc['host'], $dbc['user'], $dbc['password'], $dbc['dbName']);

    $result = $db->query("SELECT * FROM users WHERE login = '$username' AND password = '$password'");
    if($result && $result->num_rows > 0)
        $_SESSION['username'] = $_POST['inputLogin'];
    else
        echo $db->error;

    header('Location: index.php');
}

// Auto chargement des dépendences Composer
require_once '../vendor/autoload.php';

// Création d'un loader TWIG,
// pour qu'il recherche les templates dans le répertoire application/views
$loader = new Twig_Loader_Filesystem('../application/views');

// Création d'une instance de Twig
$twig = new Twig_Environment($loader);

if(isset($_SESSION['username'])) {
    $data = array(
        'username' => $_SESSION['username'],
        'page_title' => 'MycroBlog Home',
        'title'    => 'MycroBlog');
}

else {
    $data = array(
        'page_title' => 'MycroBlog Home',
        'title'      => 'MycroBlog');
}
echo $twig->render('login.twig', $data);

