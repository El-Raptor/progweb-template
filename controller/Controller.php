<?php

abstract class Controller {
    public function view($view, $data = []) {
        require $_SERVER['DOCUMENT_ROOT'] . '/trabalho/view' . $view . '.php';
    }

    public function home($data = []) {
        require $_SERVER['DOCUMENT_ROOT'] . '/trabalho/index.html';
    }
}

?>