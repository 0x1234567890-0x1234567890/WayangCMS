<?php

class WY_Controller {
    
    protected $module;
    protected $container;
    
    public function __construct($module, $container){
        $this->module = $module;
        $this->container = $container;
    }
    
    public function render($template, $data=array()){
        $loader = new Twig_Loader_Filesystem(array(
            BASEPATH."/wy_files/views",
            //BASEPATH."/common/templates",
        ));
        $twig = new Twig_Environment($loader, array(
            'cache'=>BASEPATH.'/wy_files/cache/twig',
            'auto_reload'=>true,
        ));
        
        $template = $twig->loadTemplate($template);
        $template->display($data);
    }
    
    public function redirect($to, $statusCode=302){
        header('Location: '.$this->container['base_url'].$to, true, $statusCode);
        exit();
    }
}