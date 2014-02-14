<?php

class WY_Db
{
    private static $conn;
    
    private function __construct()
    {
    
    }
    
    private static function connect()
    {
        if(!isset(self::$conn)){
            $conf = WY_Config::get('db');
            $dsn = "mysql:host=".$conf['host'].";port=".$conf['port'].";dbname=".$conf['dbname'];
            try{
                self::$conn = new PDO($dsn, $conf['username'], $conf['password']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            }catch(PDOException $e){
                self::disconnect();
                echo $e->getMessage();
            }
        }
        return self::$conn;
    }
    
    public static function disconnect(){
        self::$conn = null;
    }
    
    public static function execute($sql, $params = null)
    {
        try{
            $conn = self::connet();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
    }
    
    public static function all($sql, $params = null, $fetch_style = PDO::FETCH_ASSOC)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll($fetch_style);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
    
    public static function row($sql, $params = null, $fetch_style = PDO::FETCH_ASSOC)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch($fetch_style);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
    
    public static function one($sql, $params = null)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_NUM);
            $result = $result[0];
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
}