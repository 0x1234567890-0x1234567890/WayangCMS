<?php

class WY_MySqliConnector extends WY_Connector {
    
    protected function isValidService(){
        $isEmpty = empty($this->service);
        $isInstance = $this->service instanceof MySQLi;
        
        if($this->isConnected && $isInstance && !$isEmpty){
            return true;
        }
        return false;
    }
    
    public function connect(){
        if(!$this->isValidService()){
            $this->service = new MySQLi($this->host, $this->username, $this->password, $this->schema, $this->port);
            
            if($this->service->connect_error){
                throw new Exception('Unable to connect to service');
            }
            
            $this->isConnected = true;
        }
        return $this;
    }
    
    public function disconnect(){
        if($this->isValidService()){
            $this->isConnected = false;
            $this->service->close();
        }
        return $this;
    }
    
    public function query(){
        return new Query($this);
    }
    
    public function execute($sql){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        return $this->service->query($sql);
    }
    
    public function escape($value){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        return $this->service->real_escape_string($value);
    }
    
    public function getLastInsertId(){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        return $this->service->insert_id;
    }
    
    public function getAffectedRows(){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        return $this->service->affected_rows;
    }
    
    public function getLastError(){
        if(!$this->isValidService()){
            throw new Exception('Not connected to a valid service');
        }
        return $this->service->error;
    }
}