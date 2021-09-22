<?php

class DB {

    private static $connection;
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    );

    public static function connect($host, $user, $password, $database) {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new PDO(
                        "mysql:host=$host;dbname=$database",
                        $user,
                        $password,
                        self::$settings
                );
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }
    }

    /**
     * Gets one row from the DB.
     * 
     * @param type $query
     * @param type $params
     * @return type
     */
    public static function queryOne($query, $params = array(), $className) { //optional params are recommended to be in the last place
        try {
            $statement = self::$connection->prepare($query);
            $statement->execute($params);
            return $statement->fetchObject($className);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * Gets an array of rows matching the the given query.
     * 
     * @param type $query
     * @param type $params
     * @params type $fetchClass
     * @return type
     */
    public static function queryAll($query, $params = array(), $className) {
        try {
            $statement = self::$connection->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_CLASS, $className);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * Executes a query (e.g. insert statements) and returns the number of affected rows.
     * 
     * @param type $query
     * @param type $params
     * @return type
     */
    public static function query($query, $params = array()) {
        $statement = self::$connection->prepare($query);
        $statement->execute($params);
        return $statement->rowCount();
    }

}
