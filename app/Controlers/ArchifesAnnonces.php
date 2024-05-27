<?php


class ArchifesAnnonces
{
    use Controller;
    public function index(){
        
        if ($_SESSION['USER'][0]->Role == 'admin') {            

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $pst = [];
                if(isset($_POST['bouton'])){
                    $ann = new Annonce();
                    $qu = $ann->whereNd();

                    if(!$_POST['dateAnnonce']){
                        $_POST['dateAnnonce'] = date('Y-m-d');
                    }
                    $pst['DateArch'] = $_POST['dateAnnonce'];

                    date_default_timezone_set('Africa/Casablanca');

                    $current_date = date('Y-m-d');

                    $timestamp_fin = strtotime($pst['dateAnnonce']);
                    
                    $timestamp_actuel = strtotime($current_date);

                    if($timestamp_actuel == $timestamp_fin && $qu){
                        for($i = 0; $i<=count($qu); $i++){
                            if (is_array($qu) && isset($qu[$i]) && is_object($qu[$i])) {
                                $pst['Titre'] = $qu[$i]->Objet ?? null; 
                                $pst['Fichier'] = $qu[$i]->File ?? null;
                            } 
                            $pst['Origine'] = 'Annonce';
                            $archive = new Archive;
                            
                            if(!$archive->where($pst)){
                                $archive->insert($pst);
                                
                            }
                            $ann->delete($pst['Fichier'], 'File'); 
                        }
                     } 
                    }   $this->view('ArchivesViews/archivesAnnonce');
             }
            }
        }

    }
