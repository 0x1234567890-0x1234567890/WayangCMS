<?php

namespace system\core;

use system\core\Config;

/**
 * Kelas ini membuat koneksi dan melakukan peng-query-an ke database
 * 
 */
class Database
{   
    /**
     * @var object instance dari PDO
     * 
     */
    protected $instance;
    
    /**
     * @var boolean menentukan apakah database sudah terkoneksi
     * 
     */
    protected $isConnected;
    
    /**
     * untuk menentukan apakah database sudah terkoneksi dengan benar
     * 
     */
    protected function hasConnected()
    {
        $isEmpty = empty($this->instance);
        $isInstance = $this->instance instanceof \PDO;
        
        if($this->isConnected && $isInstance && !$isEmpty){
            return true;
        }
        
        return false;
    }
    
    /**
     * mengkoneksikan sistem ke database
     * 
     */
    public function connect()
    {
        if(!$this->hasConnected()){
            try{
                $conf = Config::get('db');
                $dbname = $conf['dbname'];
                $host = $conf['host'];
                $port = $conf['port'];
                $user = $conf['username'];
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
    
    /**
     * mempersiapkan query untuk diproses
     * @param string $sql query yang hendak di persiapkan oleh engine PDO
     */
    private function prepare($sql)
    {
        $this->connect();
        
        return $this->instance->prepare($sql);
    }
    
    /**
     * melakukan select ke database berdasarkan query tertentu
     * @param string $sql query yang ingin dijalankan
     * @param array $params variable yang ingin di-bindind ke query
     * @param boolean $multiple apakah query mengembalikan banyak baris atau tidak
     */
    public function query($sql, $params = array(), $multiple = true)
    {
        $statement = $this->prepare($sql);
        
        $results = $statement->execute($params);
        
        if ($multiple) {
            return $statement->fetchAll();
        }
        
        return $statement->fetch();
    }
    
    /**
     * memutuskan hubungan ke database
     * 
     */
    public function disconnect()
    {
        if($this->hasConnected()){
            $this->isConnected = false;
            $this->instance = null;
        }
        
        return $this;
    }
    
    /**
     * mengeksekusi perintah DDL database
     * @param string $sql perintah DDL yang ingin di eksekusi
     */
    public function execute($sql)
    {
        $this->connect();
        
        return $this->instance->exec($sql);
    }
    
    /**
     * mendapatkan pesan error terakhir yang terjadi pada sistem
     * 
     */
    public function getLastError()
    {   
        return $this->instance->errorInfo();
    }
    
    /**
     * membersihkan variable dengan engine PDO
     * @param mixed $value variable yang ingin di bersihkan
     */
    public function escape($value)
    {
        if(!$this->hasConnected()){
            throw new \Exception('Database Not Connected Yet!');
        }
        
        return $this->instance->quote($value);
    }
    
    /**
     * mendapatkan id terakhir dari baris yang berhasil di insert ke table
     * 
     */
    public function getLastInsertId()
    {
        return $this->instance->lastInsertId();
    }
}