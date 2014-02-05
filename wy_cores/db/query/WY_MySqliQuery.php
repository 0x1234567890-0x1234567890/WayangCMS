<?php

class WY_MySqliQuery {
    
    protected $connector;
    protected $from;
    protected $fields;
    protected $limit;
    protected $offset;
    protected $order;
    protected $direction;
    protected $join = array();
    protected $where = array();
    
    function __construct($connector){
        $this->connector = $connector;
    }
    
    protected function quote($value){
        if(is_string($value)){
            $escaped = $this->connector->escape($value);
            return "'{$escaped}'";
        }
        
        if(is_array($value)){
            $buffer = array();
            foreach($value as $i){
                array_push($buffer, $this->quote($i));
            }
            
            $buffer = join(', ', $buffer);
            
            return "({$buffer})";
        }
        
        if(is_null($value)){
            return "NULL";
        }
        
        if(is_bool($value)){
            return (int) $value;
        }
        
        return $this->connector->escape($value);
    }
    
    public function from($from, $fields=array('*')){
        if(empty($from)){
            throw new Exception('Invalid argument');
        }
        
        $this->from = $from;
        
        if($fields){
            $this->fields[] = $fields;
        }
        
        return $this;
    }
    
    public function join($join, $on, $fields=array()){
        if(empty($join)){
            throw new Exception('Invalid argument');
        }
        
        if(empty($on)){
            throw new Exception('Invalid argument');
        }
        
        $this->fields += array($join => $fields);
        $this->join[] = "JOIN {$join} ON {$on}";
        
        return $this;
    }
    
    public function limit($limit, $page=1){
        if(empty($limit)){
            throw new Exception('Invalid argument');
        }
        
        $this->limit = $limit;
        $this->offset = $limit * ($page - 1);
        
        return $this;
    }
    
    public function order($order, $direction="asc"){
        if(empty($order)){
            throw new Exception('Invalid argument');
        }
        
        $this->order = $order;
        $this->direction = $direction;
        
        return $this;
    }
    
    public function where(){
        $arguments = func_get_args();
        
        if(sizeof($arguments) < 1){
            throw new Exception('Invalid argument');
        }
        
        $arguments[0] = preg_replace("#\?#", "%s", $arguments[0]);
        
        foreach(array_slice($arguments, 1, null, true) as $i => $parameter){
            $arguments[$i] = $this->quote($arguments[$i]);
        }
        
        $this->where[] = call_user_func_array('sprintf', $arguments);
        
        return $this;
    }
    
    protected function buildSelect(){
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
        
        $fields = join(', ', $fields);
        
        $_join = $this->join;
        if(!empty($_join)){
            $join = join(' ', $_join);
        }
        
        $_where = $this->where;
        if(!empty($_where)){
            $joined = join(' AND', $_where);
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
    
    protected function buildInsert($data){
        $fields = array();
        $values = array();
        $template = "INSERT INTO '%s' ('%s') VALUES (%s)";
        
        foreach($data as $field => $value){
            $fields[] = $field;
            $values[] = $value;
        }
        
        $fields = join("', '", $fields);
        $values = join(", ", $values);
        
        return sprintf($template, $this->from, $fields, $values);
    }
    
    protected function buildUpdate($data){
        $parts = array();
        $where = $limit = "";
        $template = "UPDATE %s SET %s %s %s";
        
        foreach($data as $field => $value){
            $parts[] = "{$field}=".$this->quote($value);
        }
        
        $parts = join(', ', $parts);
        
        $_where = $this->where;
        if(!empty($_where)){
            $joined = join(', ', $_where);
            $where = "WHERE {$joined}";
        }
        
        $_limit = $this->limit;
        if(!empty($_limit)){
            $_offset = $this->offset;
            $limit = "LIMIT {$_limit} {$_offset}";
        }
        
        return sprintf($template, $this->from, $parts, $where, $limit);
    }
    
    protected function buildDelete(){
        $where = $limit = "";
        $template = "DELETE FROM %s %s %s";
        
        $_where = $this->where;
        if(!empty($_where)){
            $joined = join(', ', $_where);
            $where = "WHERE {$joined}";
        }
        
        $_limit = $this->limit;
        if(!empty($_limit)){
            $_offset = $this->offset;
            $limit = "LIMIT {$_limit} {$_offset}";
        }
        
        return sprintf($template, $this->from, $where, $limit);
    }
    
    public function save($data){
        $isInsert = sizeof($this->where) == 0;
        
        if($isInsert){
            $sql = $this->buildInsert($data);
        }else{
            $sql = $this->buildUpdate($data);
        }
        
        $result = $this->connector->execute($sql);
        
        if($result === false){
            throw new Exception('SQL Error');
        }
        
        if($isInsert){
            return $this->connector->getLastInsertId();
        }
        
        return 0;
    }
    
    public function delete(){
        $sql = $this->buildDelete();
        $result = $this->connector->execute($sql);
        
        if($result === false){
            throw new Exception('SQL Error');
        }
        
        return $this->connector->getAffectedRows();
    }
    
    public function first(){
        $limit = $this->limit;
        $offset = $this->offset;
        
        $this->limit(1);
        
        $all = $this->all();
        $first = WY_ArrayUtils::first($all);
        
        if($limit){
            $this->limit = $limit;
        }
        
        if($offset){
            $this->offset = $offset;
        }
        
        return $first;
    }
    
    public function count(){
        $limit = $this->limit;
        $offset = $this->offset;
        $fields = $this->fields;
        
        $this->fields = array($this->from => array("COUNT(1)" => "rows"));
        
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
        
        return $row["rows"];
    }
    
    public function all(){
        $sql = $this->buildSelect();
        $result = $this->connector->execute($sql);
        
        if($result === false){
            $error = $this->connector->getLastError();
            throw new Exception("There was an error with your SQL query: {$error}");
        }
        
        $rows = array();
        
        for($i=0; $i<$result->num_rows; $i++){
            $rows[] = $result->fetch_array(MYSQLI_ASSOC);
        }
        
        return $rows;
    }
}