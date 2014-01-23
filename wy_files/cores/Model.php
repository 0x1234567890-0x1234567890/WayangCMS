<?php

class Model{
    
    public static function queryAll($sql, array $params = array()){
        return ORM::for_table(static::$tableName)->raw_query($sql, $params)->find_many();
    }
    
    public static function queryOne($sql, array $params = array()){
        return ORM::for_table(static::$tableName)->raw_query($sql, $params)->find_one();
    }
    
    public static  function findAll(array $condition = array()){
        $orm = ORM::for_table(static::$tableName);
        foreach($condition as $func => $cond){
            call_user_func_array(array($orm, $func), (array)$cond);
        }
        return $orm->find_many();
    }
    
    public static function findById($id){
        return ORM::for_table(static::$tableName)->find_one($id);
    }
    
    public static function findAllByAttributes(array $attributes){
        $orm = ORM::for_table(static::$tableName);
        foreach($attributes as $field => $value){
            $orm->where($field, $value);
        }
        return $orm->find_many();
    }
    
    public static function findByAttributes(array $attributes){
        $orm = ORM::for_table(static::$tableName);
        foreach($attributes as $field => $value){
            $orm->where($field, $value);
        }
        return $orm->find_one();
    }
}