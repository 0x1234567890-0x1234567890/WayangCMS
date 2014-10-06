<?php

namespace wayang;

use wayang\Base as Base;

/**
 * Kelas ini membuat koneksi dan melakukan peng-query-an ke database
 * 
 */
class Database extends Base
{
    protected $type;
    protected $username;
    protected $password;
    protected $host;
    protected $port;
    protected $schema;
    protected $charset = 'utf8';
    protected $isConnected = false;
    protected $instance;
    
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
                if($this->type === 'mysql'){
                    $port = isset($this->port) ? $this->port : '3306';
                    $dsn = "mysql:dbname={$this->schema};host={$this->host};port={$port}";
                    $this->instance = new \PDO($dsn, $this->username, $this->password);
                }else{
                    $port = isset($this->port) ? $this->port : '5432';
                    $dsn = "pgsql:dbname={$this->schema};host={$this->host};port={$port};user={$this->username};password={$this->password}";
                    $this->instance = new \PDO($dsn);
                }
                $this->instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
            }
            
            $this->isConnected = true;
        }
        
        return $this;
    }
    
    public function prepare($sql)
    {
        if(!$this->hasConnected()){
            throw new \Exception('Database Not Connected Yet!');
        }
        
        return $this->instance->prepare($sql);
    }
    
    public function query()
    {
        if($this->type === 'mysql'){
            return new db\query\Mysql(array(
                'db' => $this
            ));
        }else{
            return new db\query\Pgsql(array(
                'db' => $this
            ));
        }
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
        if(!$this->hasConnected()){
            throw new \Exception('Database Not Connected Yet!');
        }
        
        return $this->instance->exec($sql);
    }
    
    public function getLastError()
    {
        if(!$this->hasConnected()){
            throw new \Exception('Database Not Connected Yet!');
        }
        
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
        if(!$this->hasConnected()){
            throw new \Exception('Database Not Connected Yet!');
        }
        
        return $this->instance->lastInsertId();
    }
}