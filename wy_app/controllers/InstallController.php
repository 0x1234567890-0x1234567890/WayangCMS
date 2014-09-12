<?php

class InstallController extends WY_TController
{
    public $layout = 'install/layout';
    
    public function index()
    {
        $this->layout->content = WY_View::fetch('install/index');
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
    
    public function step($id)
    {
        $this->layout->content = WY_View::fetch('install/'.$id);
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
    
    public function run()
    {
        $this->layout->content = WY_View::fetch('install/run');
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
}