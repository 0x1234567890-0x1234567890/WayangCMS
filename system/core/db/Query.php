<?php

namespace system\core\db;

use system\core\Base as Base;

class Query extends Base
{
	protected $db;
    
    protected $from;
    protected $fields;
    protected $limit;
    protected $offset;
    protected $order;
    protected $direction;
    protected $params;
    protected $join = array();
    protected $where;
    
    public function from($from, $fields = array('*'))
    {
        if(empty($from)){
            throw new \Exception('Invalid Argument');
        }
        
        $this->from = $from;
        
        if($fields){
            $this->fields[$from] = $fields;
        }
        
        return $this;
    }
    
    public function join($join, $on, $fields = array())
    {
        if(empty($join)){
            throw new \Exception('Invalid Argument');
        }
        
        if(empty($on)){
            throw new \Exception('Invalid Argument');
        }
        
        $this->fields += array($join => $fields);
        $this->join[] = "JOIN {$join} ON {$on}";
        
        return $this;
    }
    
    public function limit($limit, $page = 1)
    {
        if(empty($limit)){
            throw new \Exception('Invalid Argument');
        }
        
        $this->limit = $limit;
        $this->offset = $limit * ($page - 1);
        
        return $this;
    }
    
    public function order($order, $direction = 'asc')
    {
        if(empty($order)){
            throw new \Exception('Invalid Argument');
        }
        
        $this->order = $order;
        $this->direction = $direction;
        
        return $this;
    }
    
    public function where($condition, array $params = array())
    {
        if(empty($condition)){
            throw new \Exception('Invalid Argument');
        }
        
        if(!empty($params)){
            $this->params = $params;
        }
        
        $this->where[] = $condition;
        
        return $this;
    }
    
    protected function buildSelect()
    {
        $fields = array();
        $where = $order = $limit = $join = "";
        $template = "SELECT %s FROM %s %s %s %s %s";
        
        foreach($this->fields as $table => $_fields){
            foreach($_fields as $field => $alias){
                if(is_string($field)){
                    $fields[] = "{$field} AS {$alias}";
                }else{
                    $fields[] = $alias;
                }
            }
        }
        
        $fields = join(", ", $fields);
        
        $_join = $this->join;
        
        if(!empty($_join)){
            $join = implode(" ", $_join);
        }
        
        $_where = $this->where;
        
        if(!empty($_where)){
            $joined = implode(" AND ", $_where);
            $where = "WHERE {$joined}";
        }
        
        $_order = $this->order;
        
        if(!empty($_order)){
            $_direction = $this->direction;
            $order = "ORDER BY {$_order} {$_direction}";
        }
        
        $_limit = $this->limit;
        
        if(!empty($_limit)){
            $_offset = $this->offset;
            if($_offset){
                $limit = "LIMIT {$_limit}, {$_offset}";
            }else{
                $limit = "LIMIT {$_limit}";
            }
        }
        
        return sprintf($template, $fields, $this->from, $join, $where, $order, $limit);
    }
    
    protected function buildInsert($data)
    {
        $fields = array();
        $values = array();
        $template = "INSERT INTO %s (%s) VALUES (%s)";
        
        foreach($data as $field => $value){
            $fields[] = $field;
            $values[] = ':'.$field;
        }
        
        $fields = implode(", ", $fields);
        $values = implode(", ", $values);
        
        return sprintf($template, $this->from, $fields, $values);
    }
    
    protected function buildUpdate($data)
    {
        $parts = array();
        $where = $limit = "";
        $template = "UPDATE %s SET %s %s %s";
        
        foreach($data as $field => $value){
            $parts[] = "{$field} = :".$field;
        }
        
        $parts = implode(", ", $parts);
        
        $_where = $this->where;
        
        if(!empty($_where)){
            $joined = implode(", ", $_where);
            $where = "WHERE {$joined}";
        }
        
        $_limit = $this->limit;
        
        if(!empty($_limit)){
            $_offset = $this->offset;
            $limit = "LIMIT {$_limit}, {$_offset}";
        }
        
        return sprintf($template, $this->from, $parts, $where, $limit);
    }
    
    protected function buildDelete()
    {
        $where = $limit = "";
        $template = "DELETE FROM %s %s %s";
        
        $_where = $this->where;
        
        if(!empty($_where)){
            $joined = implode(", ", $_where);
            $where = "WHERE {$joined}";
        }
        
        $_limit = $this->limit;
        
        if(!empty($_limit)){
            $_offset = $this->offset;
            $limit = "LIMIT {$_limit} {$_offset}";
        }
        
        return sprintf($template, $this->from, $where, $limit);
    }
    
    public function save($data)
    {
        $isInsert = count($this->where) == 0;
        
        $paramData = array();
        foreach($data as $key => $value){
            $paramData[':'.$key] = $value;
        }
        
        if(!empty($this->params)){
            $paramData = array_merge($paramData, $this->params);
        }
        
        if($isInsert){
            $sql = $this->buildInsert($data);
        }else{
            $sql = $this->buildUpdate($data);
        }
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($paramData);
        
        if($result === false){
            throw new \Exception('Query Failed');
        }
        
        if($isInsert){
            return $this->db->getLastInsertId();
        }
        
        return $stmt->rowCount();
    }
    
    public function delete()
    {
        $sql = $this->buildDelete();
        $stmt = $this->db->prepare($sql);
        
        if(!empty($this->params)){
            $result = $stmt->execute($this->params);
        }else{
            $result = $stmt->execute();
        }
        
        if($result === false){
            throw new \Exception('Query Failed');
        }
        
        return $stmt->rowCount();
    }
    
    public function first()
    {
        $limit = $this->limit;
        $offset = $this->offset;
        
        $this->limit(1);
        
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
        
        if($limit){
            $this->limit = $limit;
        }
        
        if($offset){
            $this->offset = $offset;
        }
        
        return $stmt->fetch();
    }
    
    public function count()
    {
        $limit = $this->limit;
        $offset = $this->offset;
        $fields = $this->fields;
        
        $this->fields = array($this->from => array('COUNT(1)' => 'rows'));
        
        $this->limit(1);
        
        $row = $this->first();
        
        $this->fields = $fields;
        
        if($fields){
            $this->fields = $fields;
        }
        
        if($limit){
            $this->limit = $limit;
        }
        
        if($offset){
            $this->offset = $offset;
        }
        
        return $row->rows;
    }
}
