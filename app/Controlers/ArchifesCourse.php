<?php


class ArchifesCourse
{
    
    use Controller;

    public function index(){
        
        if ($_SESSION['USER'][0]->Role == 'admin') {
            
            $filieres = ['cp1', 'cp2', 'gi1', 'gi2', 'gi3', 'tdia1', 'tdia2', 'tdia3', 'id1', 'id2', 'id3', 'geer1', 'geer2', 'geer3', 'gee1', 'gee2', 'gee3', 'gm1', 'gm2', 'gm3', 'gc1', 'gc2', 'gc3'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $pst = [];
                if(isset($_POST['bouton'])){
                    
                    $niveau = ['Filiere' => $_POST['Niveau']];
                    $course = new Course();

                    if($_POST['Niveau'] == 'all'){
                        $qu = $course->whereNd();
                    }else{
                        $qu = $course->where($niveau);
                    }

                    if(!$_POST['dateCours']){
                        $_POST['dateCours'] = date('Y-m-d');
                    }
                    $pst['DateArch'] = $_POST['dateCours'];

                    if($qu != false){
                        for($i = 0; $i<=count($qu); $i++){
                            if (is_array($qu) && isset($qu[$i]) && is_object($qu[$i])) {
                                $pst['Titre'] = $qu[$i]->Titre ?? null; 
                                $pst['Fichier'] = $qu[$i]->File ?? null;
                            } 
                            $pst['Origine'] = 'Document';
                            $archive = new Archive;
                            
                            if(!$archive->where($pst)){
                                $archive->insert($pst);
                                
                            }
                            $course->delete($pst['Fichier'], 'File'); // à voir 
                        }
                        ?>

            <!-- pour etre dans un fichier seul -->
                            <div class="container mt-5"> 
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Succès !</strong> Vous avez archiver vos documents avec succès.
                                </div>
                            </div>
            <!------------------------------------>

                        <?php     

                    }else{?>
                        <div class="container mt-5"> 
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops !</strong> Aucun document trouvé pour archifer.
                            </div>
                        </div>
                <?php 
                    }

                }    
                
            
        } $this->view('ArchivesViews/archivesCourses', $filieres);
    }
}
}