<?php
/*
 * Copyright 2013 root <root@wayang-cms.org>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */
class Database{
    protected $pdo;
    
    public function __construct($dsn, $username, $password){
        try{
            $this->pdo=new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    
    public function query($sql, $params = array(), $many = true){
        try{
            $stmt = $this->pdo->prepare($sql);
            if(!empty($params)){
                foreach($params as $k => $v){
                    $stmt->bindParam($k, $v);
                }
            }
            $stmt->execute();
            if($many == true){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(PDO::FETCH_OBJ);
            }
            $stmt->closeCursor();
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
            return $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }
}