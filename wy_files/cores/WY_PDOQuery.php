<?php

class WY_PDOQuery {
    
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
}