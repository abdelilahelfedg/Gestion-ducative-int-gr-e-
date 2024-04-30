<?php

class AnnoncesControl
{
    use Controller;
    public function index(){
        // show($_SESSION['USER']);
       
        if($_SESSION['USER'][0]->Role == 'Prof'){
            
            
            $niveaux = $_SESSION['Professeur'][0]->Niveaux_Enseigne;
            $Arg = explode("/", $niveaux);
            
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                $de = $_POST;
                // show($_FILES);
                // show($de);
                $de['File'] = $_FILES['pdf']['name'];
                $pro = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
                $de['Prof'] = $pro;
                if($_FILES['pdf']['type'] != 'application/pdf'){
                    echo "la a sahbi hada machi pdf";
                }
                // $_FILES['pdf']['name'] = 'aaa';
                $filename = $_FILES['pdf']['name'];
                $path = '../public/assets/images/' . $filename;
                move_uploaded_file($_FILES['pdf']['tmp_name'], $path);

                $Annonce = new Annonces;
                $Annonce->insert($de);
            }
            
            
            $this->view('AnnoncesViews/annoncesProf', $Arg);
        }
        else if($_SESSION['USER'][0]->Role == 'Etudiant')
        {
           
            $data['Niveau'] = $_SESSION['Etudiant'][0]->Niveau;
            $data['Prof'] = 'Admin';
            $Annonce = new Annonces;
            $result = $Annonce->whe($data);
            
            
            // $result = $Annonce->where($data);
            
            $this->view('AnnoncesViews/annoncesEtd', $result);
        }
        else if($_SESSION['USER'][0]->Role == 'Admin')
        {
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                
                $de = $_POST;
                
                $de['Niveau'] = 'Tous les etudiants';
                $de['File'] = $_FILES['pdf']['name'];
                $de['Prof'] = 'Admin';
                $filename = $_FILES['pdf']['name'];
                $path = '../public/assets/images/' . $filename;
                move_uploaded_file($_FILES['pdf']['tmp_name'], $path);

                $Annonce = new Annonces;

                $Annonce->insert($de);
            }
            
            
             $this->view('AnnoncesViews/annoncesAdmin');
        }
        
    }
}