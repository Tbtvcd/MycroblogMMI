<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 15/12/14
 * Time: 14:39
 */
require_once '../vendor/autoload.php';

class Viewer {
    private $twig;

    public function __construct() {
        $loader = new Twig_Loader_Filesystem('../application/views');
        $this->twig = new Twig_Environment($loader);
    }

    public function render($template, $data) {
        echo $this->twig->render($template, $data);
    }
} 