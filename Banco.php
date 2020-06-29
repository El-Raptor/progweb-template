<?php
    final class Banco {
        private static $conection;

        private function __construct() {}

        public static function getInstance() {
            if (is_null(self::$conection)) {
                self::$conection = new PDO('sqlite:login.sqlite3');
                self::$conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conection;
        }

        public static function createSchema() {
            $db = self::getInstance();
            $db->exec('
                CREATE TABLE IF NOT EXISTS ranking (
                    rankingId INTEGER PRIMARY KEY AUTOINCREMENT,
                    nickname TEXT,
                    hora INTEGER,
                    minuto INTEGER,
                    segundo INTEGER
                )
            ');
        }


        
    }
?>