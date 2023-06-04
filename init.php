<?php

require "autoload.php";
require "database.php";

function e($str) {
    return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

$container = new App\Core\Container();

// var_dump($pdo->errorInfo());

// var_dump($container);
// die();

// $registerRepository = $container->make("registerRepository");
// var_dump($registerRepository->findByUser("mahmood", "mahmad@test.de", "hallo"));
// die();


?>