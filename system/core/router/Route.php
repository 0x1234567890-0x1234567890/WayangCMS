<?php

namespace wayang\router;

use wayang\Base as Base;

class Route extends Base
{
	protected $pattern;
    protected $controller;
    protected $action;
    protected $parameters = array();
}
