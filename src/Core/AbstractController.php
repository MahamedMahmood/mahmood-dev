<?php 

namespace App\Core;

abstract class AbstractController 
{

    protected function render($view, $params) {
        extract($params);
        include __DIR__ . "/../../view/{$view}.php";
    }

}

?>