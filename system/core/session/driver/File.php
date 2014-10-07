<?php

namespace system\core\session\driver;

use system\core\session as session;

class File extends session\Driver
{
	protected $prefix = 'wy_';
    
    public function __construct($options = array())
    {
        parent::__construct($options);
        session_start();
    }
    
    public function get($key, $default = null)
    {
        $prefix = $this->prefix;
        
        if(isset($_SESSION[$prefix.$key])){
            return $_SESSION[$prefix.$key];
        }
        
        return $default;
    }
    
    public function set($key, $value)
    {
        $prefix = $this->prefix;
        
        $_SESSION[$prefix.$key] = $value;
        
        return $this;
    }
    
    public function remove($key)
    {
        $prefix = $this->prefix;
        
        unset($_SESSION[$prefix.$key]);
        
        return $this;
    }
    
    public function __destruct()
    {
        session_write_close();
    }
}
