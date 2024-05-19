<?php


class Consulter
{
    use Controller;
    public function index(){
        
        if ($_SESSION['USER'][0]->Role == 'admin') {
            $data = [];
            $filieres = ['cp1', 'cp2', 'gi1', 'gi2', 'gi3', 'tdia1', 'tdia2', 'tdia3', 'id1', 'id2', 'id3', 'geer1', 'geer2', 'geer3', 'gee1', 'gee2', 'gee3', 'gm1', 'gm2', 'gm3', 'gc1', 'gc2', 'gc3'];
            
              $archive = new Archive();
              $results = $archive->whereNd();
              foreach($results as $result){
                  if(!in_array($result, $data)){
                    array_push($data, $result);
                  }
                
              }

              $this->view('ArchivesViews/consulterArchife', $data);
        }
    }
}