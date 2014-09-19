<?php

class InstallController extends WY_TController
{
    public $layout = 'install/layout';
    
    const conf_template = <<<WTF
<?php

/* konfigurasi sistem */

return array(
    'db' => array(
        'host' => '%host%', // 127.0.0.1
        'port' => '3306', // default mysql
        'username' => '%username%',
        'password' => '%password%',
        'dbname' => '%dbname%',
    ),
    'timezone' => 'Asia/Jakarta',
);
WTF;
    
    public function index()
    {
        $this->layout->content = WY_View::fetch('install/index');
        $this->layout->pageTitle = 'Wayang - Initial Installation';
        
        $config_file = fopen("wy_config/config.php", "w") or die("can't write config file, check folder permission");
        fclose($config_file);
    }
    
    public function step($id)
    {
        if(WY_Request::isPost()){
           if($id == 1){ // step 1 process handled here
                $db_host = WY_Request::post('dbhost');
                $db_name = WY_Request::post('dbname');
                $db_user = WY_Request::post('dbuser');
                $db_pass = WY_Request::post('dbpass');
                
                if(($db_host !== null) && ($db_name !== null) && ($db_user !== null)){
                    $config_file = fopen("wy_config/config.php", "w") or die("can't write config file, check folder permission");
                    $item_config = str_replace(
                        array('%host%', '%username%', '%password%', '%dbname%'),
                        array($db_host, $db_user, $db_pass, $db_name),
                        self::conf_template
                    );
                    fwrite($config_file, $item_config) or die("item config failed to write");
                    fclose($config_file);
                    
                    WY_Response::redirect('install/step/2'); // done here, move to the next step
                }
            }elseif($id == 2){ // step 2 process handled here
                $username = WY_Request::post('username');
                $password = WY_Request::post('password');
                $email = WY_Request::post('email');
                $display_name = WY_Request::post('display');
                $url = WY_Request::post('url');
                
                if($username && $password && $email && $display_name){
                    WY_Session::set('install.username', $username);
                    WY_Session::set('install.password', $password);
                    WY_Session::set('install.email', $email);
                    WY_Session::set('install.display_name', $display_name);
                    WY_Session::set('install.url', $url);
                    
                    WY_Response::redirect('install/step/3'); // done here, move to the next step
                }
                
            }else{ // step 3 process
                $web_name = WY_Request::post('wname');
                $web_url = WY_Request::post('wurl');
                $enable_sidebar = WY_Request::post('wside');
                
                if($web_name){
                    WY_Session::set('install.web_name', $web_name);
                    WY_Session::set('install.web_url', $web_url);
                    WY_Session::set('install.enable_sidebar', $enable_sidebar);
                    
                    WY_Response::redirect('install/run');
                }
            }
        }
        
        $this->layout->content = WY_View::fetch('install/step_'.$id);
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
    
    public function run()
    {
        if(WY_Request::isPost()){
            
        }
        $this->layout->content = WY_View::fetch('install/run');
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
}