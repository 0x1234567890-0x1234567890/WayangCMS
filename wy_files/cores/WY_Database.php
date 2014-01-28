<?php

class WY_Database {
    protected $pdo;
    
    public function __construct($dsn, $username, $password){
        try{
            $this->pdo = new PDO($dsn, $username, $password);
            if(DEBUG === true){
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
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
}