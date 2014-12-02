<?php
session_start();
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

// Compilation et Affichage du template (index.twig)
// Dans le fichier index.twig, le code {{ name }}
// sera remplacé par sa valeur dans le tableau ("World")

echo $twig->render('index.twig', $data);
