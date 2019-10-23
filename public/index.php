<?php
#https://twig.symfony.com/doc/2.x/intro.html#installation
require_once __DIR__.'/../vendor/autoload.php';

// Specify our Twig templates location
$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader);

echo $twig->render('index.html.twig');