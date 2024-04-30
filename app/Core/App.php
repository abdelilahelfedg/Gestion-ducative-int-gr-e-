<?php

class APP {
    private $controler = 'login';
    private $method = 'index';
    private function SplitUrl(){
        $URL = $_GET['url'] ?? 'login';
       
        $URL = explode('/', trim($URL,'/'));
        
        return $URL; 
    } 
    
    public function loadController(){
        $URL = $this->SplitUrl();
        /** Select controller */
        
        $filename = '../app/Controlers/' . ucfirst($URL[0]) . '.php';
        if(file_exists($filename)){
            require $filename;
            $this->controler = ucfirst($URL[0]);
            unset($URL[0]);
        }else{
            require '../app/Controlers/_404.php';
            $this->controler = '_404';
        }
        
        $controler = new $this->controler;
        /** Select Method */
        if(!empty($URL[1])){
            if(method_exists($controler, $URL[1])){
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        
        call_user_func_array([$controler, $this->method], $URL);
    }
}