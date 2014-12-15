<?php
session_start();

if(isset($_POST['inputLogin']) && isset($_POST['inputPassword']))
{
    include_once '../application/Database.php';

    $database = new Database();
    $user = $database->getUserFrom($_POST['inputLogin'], $_POST['inputPassword']);

    if($user)
        $_SESSION['username'] = $user->login;

    header('Location: index.php');
}

require_once '../application/Viewer.php';

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

$viewer = new Viewer();
$viewer->render('login.twig', $data);

