<?php

class HomeEtd
{
    use Controller;
    public function index(){
        // $obj = new Etudiant;
        $this->view('Etudiant');
    }
}

// $obj = new HomeEtd;
// $obj->index();