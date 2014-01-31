<?php

class WY_Configuration {
    
    protected $type;
    protected $options;
    
    public function __construct($type){
        $this->type = $type;
        if(!$this->type){
            throw new Exception('Invalid type');
        }
        
        switch($this->type){
            case 'ini':
                return new WY_IniConfigDriver($this->options);
                break;
            default:
                throw new Exception('Invalid type');
        }
    }
}