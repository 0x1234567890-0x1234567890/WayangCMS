<?php

class WY_PDODriver extends WY_Driver {

    protected function isValidService(){
        $isEmpty = empty($this->service);
        $isInstance = $this->service instanceof PDO;
        
        if($this->isConnected && $isInstance && !$isEmpty){
            return true;
        }
        return false;
    }
    
    public function connect(){
        $port = isset($this->port) ? $this->port : '3306';
        try{
            $this->service = new PDO("mysql:dbname={$this->schema};host={$this->host};port={$this->port}", $this->username, $this->password);
            $this->service->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            if(DEBUG === true){
                $this->service->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            $this->isConnected = true;
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $this;
    }
    
    public function disconnect(){
        if($this->isValidService()){
            $this->isConnected = false;
            $this->service = null;
        }
        return $this;
    }
    
    public function query(){
        return new WY_PDOQuery($this);
    }
    
    public function execute($sql, $params = array()){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        
        try{
            $stmt = $this->service->prepare($sql);
            if(!empty($params)){
                foreach($params as $k => $v){
                    $stmt->bindParam($k, $v);
                }
            }
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function quote($value){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        return $this->service->quote($value);
    }
    
    public function getLastInsertId(){
        return $this->service->lastInsertId();
    }
}