<?php

class WY_Configuration {
    
    protected $type;
    
    public function __construct($type){
        $this->type = $type;
    }
    
    public function initialize(){
        switch($this->type){
            case 'ini':
                return new WY_IniConfigDriver();
                break;
            default:
                throw new Exception('Invalid type');
        }
    }
}