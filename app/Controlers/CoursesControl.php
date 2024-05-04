<?php

class CoursesControl
{
    use Controller;
    public function index(){
       
        if($_SESSION['USER'][0]->Role == 'prof'){
            
            
            $niveaux = $_SESSION['Professeur'][0]->Niveau;
            $Arg = explode("/", $niveaux);
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $de = $_POST;
                $de['Type'] = $_POST['Type'];
                $de['File'] = $_FILES['course']['name'];
                $pro = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
                $de['Prof'] = $pro;

                if($_FILES['course']['type'] != "application/pdf" && $_FILES['course']['type'] != "video/mp4"){
                    $this->view('CoursesViews/courseProf');
                }

                $filename = $_FILES['course']['name'];
                $path = '../public/assets/uploads/' . $filename;
                move_uploaded_file($_FILES['course']['tmp_name'], $path);
                $Course = new Course;
                $Course->insert($de);?>

                <div class="container mt-5">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès !</strong> Votre document a été partagé avec succès.
                  </div>
                </div>
<?php
            }
            
            $this->view('CoursesViews/courseProf', $Arg);
        }
        else if($_SESSION['USER'][0]->Role == 'etud')
        {
           
            $data['Filiere'] = $_SESSION['Etudiant'][0]->Niveaux_Enseigne;
            $data['Prof'] = 'Admin';
            $Course = new Course;
            $result = $Course->whe($data);
            
            $this->view('CoursesViews/courseEtd', $result);
        }
        
        else if($_SESSION['USER'][0]->Role == 'admin')
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $de = $_POST;
                
                $de['Filiere'] = 'Tous les etudiants';
                $de['File'] = $_FILES['course']['name'];
                $de['Type'] = $_POST['Type'];
                $de['Prof'] = 'Admin';
                $filename = $_FILES['course']['name'];
                $path = '../public/assets/uploads/' . $filename;
                move_uploaded_file($_FILES['course']['tmp_name'], $path);

                $Course = new Course;
                $Course->insert($de);
            }
            
            
             $this->view('CoursesViews/courseAdmin');
        }
        
    }
}



