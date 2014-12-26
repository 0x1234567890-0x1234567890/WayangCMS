<?php

namespace system\core;

use system\core\Config;

/**
 * Kelas ini membuat koneksi dan melakukan peng-query-an ke database
 * 
 */
class Database
{
    protected $instance;
    protected $isConnected;
    
    protected function hasConnected()
    {
        $isEmpty = empty($this->instance);
        $isInstance = $this->instance instanceof \PDO;
        
        if($this->isConnected && $isInstance && !$isEmpty){
            return true;
        }
        
        return false;
    }
    
    public function connect()
    {
        if(!$this->hasConnected()){
            try{
                $conf = Config::get('db');
                $dbname = $conf['dbname'];
                $host = $conf['host'];
                $port = $conf['port'];
                $user = $conf['user'];
                $password = $conf['password'];
                
                $dsn = "mysql:dbname={$dbname};host={$host};port={$port}";
                $this->instance = new \PDO($dsn, $user, $password);
                
                $this->instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
            }
            
            $this->isConnected = true;
        }
    }
    
    public function prepare($sql)
    {
        $this->connect();
        
        return $this->instance->prepare($sql);
    }
    
    public function query($sql, $params = array(), $multiple = true)
    {
        $statement = $this->prepare($sql);
        
        $results = $statement->execute($params);
        
        if ($multiple) {
            return $results->fetch();
        }
        
        return $results->fetchAll();
    }
    
    public function disconnect()
    {
        if($this->hasConnected()){
            $this->isConnected = false;
            $this->instance = null;
        }
        
        return $this;
    }
    
    public function execute($sql)
    {
        $this->connect();
        
        return $this->instance->exec($sql);
    }
    
    public function getLastError()
    {   
        return $this->instance->errorInfo();
    }
    
    public function escape($value)
    {
        if(!$this->hasConnected()){
            throw new \Exception('Database Not Connected Yet!');
        }
        
        return $this->instance->quote($value);
    }
    
    public function getLastInsertId()
    {
        return $this->instance->lastInsertId();
    }
}