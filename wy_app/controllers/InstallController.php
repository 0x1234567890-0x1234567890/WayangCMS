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
                
                WY_Session::set('install.web_name', $web_name);
                WY_Session::set('install.web_url', $web_url);
                WY_Session::set('install.enable_sidebar', $enable_sidebar);
                
                WY_Response::redirect('install/run');
            }
        }
        
        $this->layout->content = WY_View::fetch('install/step_'.$id);
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
    
    public function run()
    {
        if(WY_Request::isPost()){
            $table_sql = array();
            $migration = new WY_Migration();
        
            $table_sql[] = $migration->createTable('wy_user', array(
                'user_id' => 'pk',
                'username' => 'string NOT NULL',
                'pass' => 'string NOT NULL',
                'email' => 'string NOT NULL',
                'url' => 'string NOT NULL',
                'date_registered' => 'datetime NOT NULL',
                'activation' => 'string DEFAULT NULL',
                'status' => 'string NOT NULL',
                'display_name' => 'string NOT NULL',
            ));
            
            $table_sql[] = $migration->createTable('wy_category', array(
                'cat_id' => 'pk',
                'title' => 'string NOT NULL',
                'date_add' => 'datetime NOT NULL',
                'published' => 'tinyint(4) NOT NULL DEFAULT 0',
                'date_modified' => 'datetime NULL',
                'permalink' => 'string NOT NULL'
            ));
            
            $table_sql[] = $migration->createTable('wy_comment', array(
                'c_id' => 'pk',
                'c_name' => 'string NOT NULL',
                'c_email' => 'string NOT NULL',
                'c_url' => 'string NOT NULL',
                'c_date' => 'datetime NOT NULL',
                'c_content' => 'text NOT NULL',
                'c_post_id' => 'integer NULL',
                'c_page_id' => 'integer NULL',
                'c_ip' => 'varchar(15) NOT NULL',
                'is_parent' => 'integer NOT NULL DEFAULT 0'
            ));
            
            $table_sql[] = $migration->createTable('wy_page', array(
                'page_id' => 'pk',
                'author' => 'integer NOT NULL',
                'title' => 'string NOT NULL',
                'date_add' => 'datetime NOT NULL',
                'content' => 'longtext DEFAULT NULL',
                'comment_open' => 'tinyint(4) NOT NULL',
                'published' => 'tinyint(4) NOT NULL',
                'date_modified' => 'datetime NULL',
                'use_plugin' => 'string NULL',
                'is_parent' => 'integer NOT NULL',
                'permalink' => 'string NOT NULL'
            ));
            
            $table_sql[] = $migration->createTable('wy_plugin', array(
                'plugin_id' => 'pk',
                'plugin_name' => 'string NOT NULL',
                'plugin_path' => 'string NOT NULL',
                'is_active' => 'tinyint(4) NOT NULL'
            ));
            
            $table_sql[] = $migration->createTable('wy_post', array(
                'post_id' => 'pk',
                'title' => 'string NOT NULL',
                'cat_id' => 'integer NOT NULL',
                'tag' => 'string NOT NULL',
                'date_add' => 'datetime NOT NULL',
                'author' => 'integer NOT NULL',
                'content' => 'longtext NOT NULL',
                'comment_open' => 'tinyint(4) NOT NULL',
                'comment_count' => 'integer NOT NULL',
                'permalink' => 'string NOT NULL',
                'published' => 'tinyint(4) NOT NULL',
                'date_modified' => 'datetime DEFAULT NULL'
            ));
            
            $table_sql[] = $migration->createTable('wy_setting', array(
                's_id' => 'pk',
                's_key' => 'string NOT NULL',
                's_value' => 'string NULL',
                'is_auto' => 'varchar(4) NULL'
            ));
            
            $table_sql[] = $migration->createTable('wy_themes', array(
                'themes_id' => 'pk',
                'themes_name' => 'string NOT NULL',
                'themes_path' => 'string NOT NULL',
                'is_active' => 'tinyint(4) NOT NULL'
            ));
            
            $table_sql[] = $migration->createTable('wy_usermeta', array(
                'um_id' => 'pk',
                'user_id' => 'integer NOT NULL',
                'key_name' => 'string NOT NULL',
                'key_value' => 'string NULL'
            ));
            
            foreach($table_sql as $sql){
                WY_Db::execute($sql);
            }
            
            WY_Db::execute('INSERT INTO wy_user 
                (`username`, `pass`, `email`, `url`, `date_registered`, `status`, `display_name`) 
                VALUES
                ('.$this->quote(WY_Session::get('install.username')).', 
                '.$this->quote(sha1(WY_Session::get('install.password'))).', 
                '.$this->quote(WY_Session::get('install.email')).', 
                '.$this->quote(WY_Session::get('install.url')).', NOW(), 
                "admin", '.$this->quote(WY_Session::get('install.display_name')).')');
            
            WY_Response::redirect('');
        }
        
        $this->layout->content = WY_View::fetch('install/run');
        $this->layout->pageTitle = 'Wayang - Initial Installation';
    }
    
    private function quote($name)
    {
        return '"'.$name.'"';
    }
}