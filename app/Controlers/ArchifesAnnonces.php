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


                    if($qu != false){
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
                            $ann->delete($pst['Fichier'], 'File'); // à voir 
                        }
                        ?>

            <!-- pour etre dans un fichier seul -->
                            <div class="container mt-5"> 
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Succès !</strong> Vous avez archiver vos annonces avec succès.
                                </div>
                            </div>
            <!------------------------------------>

                        <?php     

                    }else{?>
                        <div class="container mt-5"> 
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops !</strong> Aucune annonce trouvé pour archifer.
                            </div>
                        </div>
                <?php 
                    }
                
            
            } 
        }   $this->view('ArchivesViews/archivesAnnonce');
    }
    }
}