<?php

class HomeAdmin
{
    use Controller;
    public function index(){
        if(!isset($_SESSION['USER'])){
            
            header('Location: '. ROOT);
        }
        // $obj = new Etudiant;
        $this->view('Admin');
    }
}
