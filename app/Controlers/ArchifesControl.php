<?php


class ArchifesControl
{
    use Controller;
    public function index(){
        if ($_SESSION['USER'][0]->Role == 'admin') {
            $this->view('ArchivesViews/gestionArchife');
        }
    }
}