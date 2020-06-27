<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/trabalho/model/Banco.php');
Banco::createSchema();

include_once($_SERVER['DOCUMENT_ROOT'] . '/trabalho/controller/Login.php');
$controller = new LoginController();

switch ($_GET['action']) {
    case 'cadastrar':
        $controller->signUp();
        break;
    case 'info':
        $controller->info();
        break;
    case 'sair':
        $controller->logout();
        break;
    case 'home':
        $controller->home();
        break;
    default:
        $controller->login();
}

?>