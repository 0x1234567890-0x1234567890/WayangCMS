<?php

namespace system\core;

/**
 * Kelas ini berfungsi menangani rendering view dan layout sistem
 * 
 */
class View
{
    const HEAD = 'VIEW_HEAD';
    const BOTTOM = 'VIEW_BOTTOM';
    const READY = 'VIEW_READY';
    /**
     * @var string judul halaman
     * 
     */
    public $title = "";
    
    /**
     * @var array blok untuk konten dinamis
     * 
     */
    public $blocks;
    
    /**
     * @var array parameter yang tersedia di semua template
     * 
     */
    public $params;
    
    public $cssScripts = array();
    
    public $jsScripts = array();
    
    public $cssFiles = array();
    
    public $jsFiles = array();
    
    public $metaTags = array();
    
    public function __construct()
    {
        Events::add('VIEW_HEAD', array($this, 'resolveHeadAssets'));
        Events::add('VIEW_END_BODY', array($this, 'resolveBottomAssets'));
    }
    
    /**
     * me-render view yang telah ditetapkan
     * @param mixed $_data_ data-data yang akan di outputkan
     * @param boolean $_print_ menentukan apakah view langsung di echo atau tidak
     */
    public function render($_view_, $_data_ = null, $_print_ = true)
    {
        if (!is_null($_data_) and is_array($_data_)) {
            extract($_data_, EXTR_SKIP);
        }
        
        if (!file_exists($_view_)) {
            throw new \Exception("The view file doesn't exist");
        }
        
        if (!$_print_) {
            ob_start();
            ob_implicit_flush(false);
        }
        
        require_once $_view_;
        
        if (!$_print_) {
            return ob_get_clean();
        }
    }
    
    public function beginPage()
    {
        Events::fire('VIEW_BEGIN_PAGE');
    }
    
    public function endPage()
    {
        Events::fire('VIEW_END_PAGE');
    }
    
    public function head()
    {
        Events::fire('VIEW_HEAD');
    }
    
    public function beginBody()
    {
        Events::fire('VIEW_BEGIN_BODY');
    }
    
    public function endBody()
    {
        Events::fire('VIEW_END_BODY');
    }
    
    /**
     * menampilkan konten dinamis yang sudah di set sebelum nya
     * @param string $key id dari konten dinamis
     */
    public function block($key)
    {
        if (isset($this->blocks[$key])) {
            return $this->blocks[$key];
        }
    }
    
    /**
     * memulai penangkapan output konten dinamis di view
     * @param string $key id dari konten dinamis
     */
    public function beginBlock($key)
    {
        ob_start();
        ob_implicit_flush(false);
    }
    
    /**
     * mengakhiri penangkapan output konten dinamis
     * 
     */
    public function endBlock($key)
    {
        $this->blocks[$key] = ob_get_clean();
    }
    
    public function registerCss($css)
    {
        $this->cssScripts[] = $css;
    }
    
    public function registerCssFile($file)
    {
        $this->cssFiles[] = $file;
    }
    
    public function registerJs($js, $position = 'VIEW_BOTTOM')
    {
        $this->jsScripts[$position][] = $js;
    }
    
    public function registerJsFile($file, $position = 'VIEW_BOTTOM')
    {
        $this->jsFiles[$position][] = $file;
    }
    
    public function registerMeta()
    {
        
    }
    
    public function resolveHeadAssets()
    {
        $baseUrl = Registry::getRequest()->baseUrl();
        
        foreach ($this->cssFiles as $file) {
            echo "<link href='{$baseUrl}{$file}' rel='stylesheet' media='all' />";
        }
        
        if (!empty($this->cssScripts)) {
            echo '<style>';
            foreach ($this->cssScripts as $css) {
                echo $css;
            }
            echo '</style>';
        }
        
        if (!empty($this->jsScripts[self::HEAD])) {
            echo '<script>';
            foreach ($this->jsScripts[self::HEAD] as $script) {
                echo $script;
            }
            echo '</script>';
        }
        
        if (!empty($this->jsFiles[self::HEAD])) {
            foreach ($this->jsFiles[self::HEAD] as $file) {
                echo "<script src='{$baseUrl}{$file}'></script>";
            }
        }
    }
    
    public function resolveBottomAssets()
    {
        $baseUrl = Registry::getRequest()->baseUrl();
        
        if (!empty($this->jsFiles[self::BOTTOM])) {
            foreach ($this->jsFiles[self::BOTTOM] as $file) {
                echo "<script src='{$baseUrl}{$file}'></script>";
            }
        }
        
        if (!empty($this->jsScripts[self::BOTTOM])) {
            echo '<script>';
            foreach ($this->jsScripts[self::BOTTOM] as $script) {
                echo $script;
            }
            echo '</script>';
        }
    }
}
