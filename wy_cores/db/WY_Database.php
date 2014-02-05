<?php

class WY_Database {
    
    protected $type;
    protected $options;
    
    function __construct($type, array $options){
        $this->type = $type;
        $this->options = $options;
    }
    
    public function initialize(){
        switch($this->type){
            case 'mysqli':
                return new WY_MySqliDriver($this->options);
                break;
            case 'pdo-mysql':
                return new WY_PdoDriver($this->options);
                break;
            default:
                throw new Exception('Invalid type');
        }
    }
}