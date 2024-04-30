<?php

trait Controller{
    public function view($name, $data = []){

        if(!empty($data)){
            extract($data);
        }
        
        $filename = '../app/Views/' . $name . '.view.php';
        if(file_exists($filename)){
            require $filename;
        }else{
            require '../app/Views/404.php';
        }
    }
}