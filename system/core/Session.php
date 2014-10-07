<?php

namespace system\core;

use system\core\Base as Base;
use system\core\session as session;

/**
 * Kelas ini berfungsi sebagai wrapper untuk session pada PHP
 * pengambilan penge-set-an session dilakukan melalui kelas ini
 */
class Session extends Base
{
    protected $type;
    protected $options;
    
    public function init()
    {
        $type = $this->type;
        
        if(empty($type)){
            throw new \Exception('Invalid Type');
        }
        
        switch($type){
            case "file":
                return new session\driver\File($this->options);
                break;
            default:
                throw new \Exception('Invalid Type');
        }
    }
}