<?php

class WY_Controller {
    
    protected $module;
    
    public function __construct($module){
        $this->module = $module;
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
        $configuration = WY_Registry::get('configuration');
        $parsed = $configuration->parse('wy_files/confs/app');
        
        header('Location: '.$parsed->base_url.$to, true, $statusCode);
        exit();
    }
}