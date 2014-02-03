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
                return new WY_MySqliConnector($this->options);
                break;
            case 'pdo-mysql':
                return new WY_PdoMySqlConnector($this->options);
                break;
            default:
                throw new Exception('Invalid type');
        }
    }
}