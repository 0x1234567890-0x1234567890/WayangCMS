<?php

namespace system\core\router;

use system\core\Base as Base;

class Route extends Base
{
	protected $pattern;
    protected $controller;
    protected $action;
    protected $parameters = array();
}
