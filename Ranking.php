<?php 
include_once('Banco.php');

class Ranking {
    private $nickname;
    private $hora;
    private $minuto;
    private $segundo;

    function __construct($nickname, $hora, $minuto, $segundo) {
        $this->nickname = $nick;
        $this->hora = $hora;
        $this->minuto = $minuto;
        $this->segundo = $segundo;
    }

    public function create() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('
            INSERT INTO ranking (nickname, hora, minuto, segundo)
            VALUES (:nickname, :hora, :minuto, :segundo)
        ');

        $stmt->bindValue(':nickname', $this->nickname);
        $stmt->bindValue(':hora', $this->hora);
        $stmt->bindValue(':minuto', $this->minuto);
        $stmt->bindValue(':segundo', $this->segundo);
        $stmt->execute();
    }

    public static function readAll() {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM ranking ORDER BY (hora, minuto, segundo)');
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result) {
            $ranking = new Ranking($result['nickname'], $result['hora'], $result['minuto'], $result['segundo']);
        } else {
            return null;
        }
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getMinuto() {
        return $this->minuto;
    }

    public function setMinuto($minuto) {
        $this->minuto = $minuto;
    }

    public function getSegundo() {
        return $this->segundo;
    }

    public function setSegundo($segundo) {
        $this->segundo = $segundo;
    }
}

?>