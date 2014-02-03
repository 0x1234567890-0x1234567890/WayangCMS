<?php

class WY_Connector {
    
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
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
        $this->connect();
    }
}