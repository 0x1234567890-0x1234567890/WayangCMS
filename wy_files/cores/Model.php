<?php

require_once '../libs/idiorm.php';

class Model{
    
    public static function queryAll($sql, array $params = array()){
        return ORM::for_table(static::$tableName)->raw_query($sql, $params)->find_many();
    }
    
    public static function queryOne($sql, array $params = array()){
        return ORM::for_table(static::$tableName)->raw_query($sql, $params)->find_one();
    }
    
    public static  function findAll(array $condition = array(), array $params = array()){
        $orm = ORM::for_table(static::$tableName);
        foreach($condition as $func => $cond){
            if($func === 'where'){
                $orm->where_raw($cond, $params);
            }
            $orm->$func($cond);
        }
        
        return $orm->find_many();
    }
    
    public static function findById($id){
        return ORM::for_table(static::$tableName)->find_one($id);
    }
    
    public static function findAllByAttributes($attributes, array $params = array()){
        
    }
    
    public static function findByAttributes($attributes, array $params = array()){
        
    }
}