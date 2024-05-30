<?php

class HomeEtd
{
    use Controller;
    public function index(){
        if(!isset($_SESSION['USER'])){
            
            header('Location: '. ROOT);
        }
        
        $this->view('Etudiant');
    }
}

