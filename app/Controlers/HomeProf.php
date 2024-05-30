<?php

class HomeProf
{
    use Controller;
    public function index(){
        if(!isset($_SESSION['USER'])){
            
            header('Location: '. ROOT);
        }
        // $obj = new Etudiant;
        $this->view('Prof');
    }
}

