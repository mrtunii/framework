<?php

namespace Core;

use App\Config;
use PDO;

/**
 * Class Model
 *
 * @author Otto Mamestsarashvili
 * @package Core
 */
abstract class Model
{

    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {

            try {
                $dsn = "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8";
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
                return $db;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function all()
    {
        $db = static::getDB();

        $query = $db->query('SELECT id,title from posts');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}