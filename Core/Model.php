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

        $model = self::getModelDBName();

        $query = $db->query("SELECT * from $model");
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public static function find($id)
    {
        $db = static::getDB();

        $model = self::getModelDBName();


        $query = $db->query("SELECT * from $model where id=$id");
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


    protected function getModelDBName()
    {
        $modelName = get_called_class();
        $regex = "/[^\\\]+$/";
        preg_match($regex, $modelName, $matches);
        $modelName = $matches[0];
        $modelNameForDB = lcfirst($modelName);

        return $modelNameForDB;
    }
}