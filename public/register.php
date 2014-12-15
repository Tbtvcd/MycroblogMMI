<?php
session_start();

if(isset($_POST['inputLogin']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
    include_once '../application/Database.php';

    $database = new Database();
    $database->saveUser($_POST['inputLogin'], $_POST['inputPassword'], $_POST['inputEmail']);

    $_SESSION['username'] = $_POST['inputLogin'];
    header('Location: index.php');
}

else {
    // Auto chargement des dépendences Composer
    require_once '../vendor/autoload.php';

    // Création d'un loader TWIG,
    // pour qu'il recherche les templates dans le répertoire application/views
    $loader = new Twig_Loader_Filesystem('../application/views');

    // Création d'une instance de Twig
    $twig = new Twig_Environment($loader);

    $data = array(
        'page_title' => 'MycroBlog Home',
        'title'      => 'MycroBlog');

    // Compilation et Affichage du template (index.twig)
    // Dans le fichier index.twig, le code {{ name }}
    // sera remplacé par sa valeur dans le tableau ("World")
    echo $twig->render('register.twig', $data);
}

