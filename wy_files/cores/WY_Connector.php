<?php

class Connector {
    
    protected $service;
    protected $host;
    protected $username;
    protected $password;
    protected $schema;
    protected $port;
    protected $charset;
    protected $engine;
    protected $isConnected = false;
    
    function __construct(array $options){
        foreach($options as $key => $value){
            $this->$key = $value;
        }
        $this->connect();
    }
    
    public function connect(){
        
    }
}