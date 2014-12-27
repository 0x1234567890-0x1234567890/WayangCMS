<?php

namespace system\core;

/**
 * Kelas ini berfungsi sebagai base system controller
 * 
 */
abstract class Controller
{
    /**
     * @var string id dari controller yang sedang diakses
     * 
     */
    public $id;
    
    /**
     * @var string view layout yang dipakai oleh controller ini
     * 
     */
    public $layout = 'main';
    
    /**
     * @var string module dimana controller ini berada
     * 
     */
    public $module;
    
    /**
     * Konstruktor dari kelas
     * @param string $id id unik untuk controller ini
     * @param string $module module dimana controller ini berada
     * @param string $action action yang sedang dieksekusi controller ini
     */
    public function __construct($id, $module, $action)
    {
        $this->id = $id;
        $this->module = $module;
        $this->action = $action;
    }
    
    /**
     * menampilkan view
     * @param string $view nama dari file yang ingin dirender
     * @param array $params parameter yang ingin ditampilkan didalam view
     * @param boolean $print apakah view langsung ditampilkan atau ditampung ke variable
     */
    public function render($view, $params = array(), $print = true)
    {
        $obj = new View();
        
        $viewFile = $this->getViewFile($view);
        
        $content = $obj->render($viewFile, $params);
        
        if (is_string($this->layout)) {
            $layoutFile = $this->getViewFile($this->layout, true);
        
            return $obj->render($layoutFile, array('content' => $content));
        }
        
        return $content;
    }
    
    /**
     * mengalihkan request saat ini ke url tertentu
     * @param string $url url yang ingin dituju
     * @param integer $status http status untuk redirect 302 atau 301
     */
    public function redirect($url, $status = 302)
    {
        Registry::getResponse()->redirect($url, $status);
    }
    
    /**
     * mendapatkan lokasi dari view yang ingin dirender
     * @param string $view nama view yang ingin dirender
     * @param boolean $layout apakah view yang ingin dirender adalah layout
     */
    public function getViewFile($view, $layout = false)
    {
        $dir = 'layouts';
        
        if (!$layout) {
            $dir = $this->id;
        }
        
        return BASEPATH . DIRECTORY_SEPARATOR . $this->module . DIRECTORY_SEPARATOR . 'views' .DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $view . '.php';
    }
    
    /**
     * magic getter
     * @param string $key nama property yang ingin diakses
     */
    public function __get($key)
    {
        $getter = 'get' . ucfirst($key);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
        
        return null;
    }
}