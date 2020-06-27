<?php
include_once('Banco.php');

class User {
    private $email;
    private $password;
    private $nickname;
    private $name;

    function __construct($email, string $password, $nickname, $nome) {
        $this->email = $email;
        $this->password = hash('sha256', $password);
        $this->nickname;
        $this->name;
    }

    public function equals($email, $password) {
        return $this->email === $email && $this->password === hash('sha256', $password);
    }

    public function save() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('
            INSERT INTO users (email, password, nickname, name) 
            VALUES (:email, :password, :nickname, :name)'
        );
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', $this->password);
        $stmt->bindValue(':nickname', $this->nickname);
        $stmt->bindValue(':name', $this->name);
        $stmt->execute();
    }

    public static function search($email) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute(); 

        $result = $stmt->fetch();

        if ($result) {
            $user = new User($result['email'], $result['password'], $result['nickname'], $result['name']);
            $user->password = $result['password'];
            return $user;
        } else {
            return null;
        }
    }
}
?>