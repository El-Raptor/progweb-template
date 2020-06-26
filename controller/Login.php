<?php

require $_SERVER['DOCUMENT_ROOT'] . '/trabalho/model/User.php';
require 'Controller.php';

class LoginController extends Controller {
    private $loggedUser;

    function __construct() {
        session_start();
        if (isset($_SESSION['user']))
            $this->loggedUser = $_SESSION['user'];
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = User::search($_POST['email']);

            if (!is_null($user) && $user->equals($_POST['email'])) {
                $_SESSION['user'] = $this->loggedUser = $user;
            }

            if ($this->loggedUser) {
                // TODO;
                // Substituir a âncora "login" e "cadastro" pelo nome do usuário.
                header('Location: ../index.php');
            } else {
                // TODO;
                // Aviso de erro de senha ou email.
                echo "erro";
                echo $this->loggedUser;
                //header('Location: ../errror');
            }
        } else {
            if (!$this->loggedUser) {
                $this->view('/users/login');
            } else {
                // TODO;
                // Criar página de informação de perfil do usuário.
                header('Location: /users/info.php');
            }
        }
    }

    public function signUp() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User($_POST['email'], $_POST['password'], $_POST['nickname'], $_POST['name']);

            try {
                $user->save();
                // TODO;
                // Aviso de sucesso de cadastro
                header('Location: ../index.php');
            } catch(PDOException $e) {
                // TODO;
                // Aviso de email já cadastrado 
                header('Location: ../error.php');
            }

            $this->view('/users/info', $this->loggedUser);
        } else {
            $this->view('/users/signup');
        }
    }

    public function info() {
        if (!$this->loggedUser) {
            // TODO;
            // Aviso de que o usuário deve se identificar antes de entrar no perfil
            header('Location: index.php?action=enter&message=Você precisa se identificar primeiro!');
            return;
        } 
        $this->view('users/info', $this->loggedUser);
    }

    public function logout() {
        if (!$this->loggedUser) {
            // TODO;
            header('Location: index.php?action=enter&message=Você precisa se identificar primeiro!');
            return;
        } else {
            unset($_SESSION['user']);
            header('Location: ../index.html');
        }
    }
}

?>