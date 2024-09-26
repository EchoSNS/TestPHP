<?php

namespace Gray\Test;

class Controller{
    protected function render($view, $data = []){
        extract($data);

        include "Views/$view.view.php";
    }
}