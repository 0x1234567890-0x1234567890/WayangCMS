<?php

namespace wayang\db\query;

use wayang\db as db;

class Mysql extends db\Query
{
	public function all()
    {
        $sql = $this->buildSelect();
        $stmt = $this->db->prepare($sql);
        
        if(!empty($this->params)){
            $result = $stmt->execute($this->params);
        }else{
            $result = $stmt->execute();
        }
        
        if($result === false){
            $error = $this->db->getLastError();
            throw new \Exception("There was an error with your SQL query: {$error}");
        }
        
        return $stmt->fetchAll();
    }
}