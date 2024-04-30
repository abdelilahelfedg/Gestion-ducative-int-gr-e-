<?php

class HomeAdmin
{
    use Controller;
    public function index(){
        // $obj = new Etudiant;
        $this->view('Admin');
    }
}