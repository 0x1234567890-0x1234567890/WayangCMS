<?php

class WY_Controller {
    
    protected $module;
    
    public function __construct($module){
        $this->module = $module;
    }
    
    public function render($template, $data=array()){
        $loader = new Twig_Loader_Filesystem(array(
            BASEPATH."/{$this->module}/views",
            BASEPATH."/wy_shared/views",
        ));
        $twig = new Twig_Environment($loader, array(
            'cache'=>BASEPATH.'/wy_cache/twig',
            'auto_reload'=>true,
        ));
        
        $configuration = WY_Registry::get('configuration');
        $parsed = $configuration->parse("wy_confs/app");
        
        $baseUrl = $parsed->base_url;
        
        $twig->addGlobal('base_url', $baseUrl);
        
        $template = $twig->loadTemplate($template);
        $template->display($data);
    }
    
    public function redirect($to, $statusCode=302){
        $configuration = WY_Registry::get('configuration');
        $parsed = $configuration->parse('wy_confs/app');
        
        header('Location: '.$parsed->base_url.$to, true, $statusCode);
        exit();
    }
}