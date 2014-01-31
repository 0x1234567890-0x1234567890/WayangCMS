<?php

class WY_PdoConnector {

    protected function isValidService(){
        $isEmpty = empty($this->service);
        $isInstance = $this->service instanceof PDO;
        
        if($this->isConnected && $isInstance && !$isEmpty){
            return true;
        }
        return false;
    }
    
    public function connect(){
        try{
            $this->service = new PDO("mysql:dbname={$this->schema};host={$this->host};port={$this->port}", $this->username, $this->password);
            if(DEBUG === true){
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    
    public function query($sql, $params = array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            
            if(!empty($params)){
                foreach($params as $k => $v){
                    $stmt->bindParam($k, $v);
                }
            }
            
            $stmt->execute();
            
            // always use limit 1 to find unique row from DB
            if(strpos(strtolower($sql), 'limit 1') === false){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(PDO::FETCH_OBJ);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }
    
    public function execute($sql, $params = array()){
        try{
            $stmt = $this->pdo->prepare($sql);
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
        return false;
    }
    
    public function quote($value){
        return $this->pdo->quote($value);
    }
    
    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }
    
    public function disconnect(){
        $this->pdo = null;
    }
}