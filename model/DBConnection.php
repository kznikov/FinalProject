<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'final_project');
define('DB_USER', 'root');
define('DB_PASS', '');

class DBConnection {

    private static $db = null;

    public static function getDb() {
        if (self::$db === null) {
            try {
                self::$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                if ($e->getCode() === 2002) {
                    die("<h3>Cannot connect to the database!</h3>");
                }
            }
        }

        return self::$db;
    }

}

?>