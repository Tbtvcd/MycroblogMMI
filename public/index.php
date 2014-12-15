<?php
session_start();
// Auto chargement des dépendences Composer
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
$viewer->render('index.twig', $data);