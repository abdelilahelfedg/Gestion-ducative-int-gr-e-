<?php

use function PHPSTORM_META\type;

class ComptesRendusControl
{
    use Controller;
    public function index(){
        if(!isset($_SESSION['USER'])){
            
            header('Location: '. ROOT);
        }

            if($_SESSION['USER'][0]->Role == 'Prof'){
                $email = $_SESSION['Professeur'][0]->Email;
                $de['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            
            
                $data['email_prof_cours'] = $email;
            
                $obj = new Module;
                $result = $obj->where($data);
                for($i = 0; $i < count($result); $i++){
                    $modules[$i] = $result[$i]->nom;
                }
            
            $this->view('ComptesRendusViews/ComptesRendusProf', $modules);
            }
            else if($_SESSION['USER'][0]->Role == 'Etudiant'){
                
                $this->view('Etudiant');   
            }
            
        
        
        
    }

    public function Definir(){
        $email = $_SESSION['Professeur'][0]->Email;
        $de['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            
            
        $data['email_prof_cours'] = $email;
            
        $obj = new Module;
        $result = $obj->where($data);
        for($i = 0; $i < count($result); $i++){
            $modules[$i] = $result[$i]->nom;
        }
        
        
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            
            $infos['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            $infos['Module'] = $_POST['Module'];
            $infos1['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            $infos1['Module'] = $_POST['Module'];
            
            $infos['date_f'] = $_POST['Date_f'];
            $infos['time_f'] = $_POST['Time_f'];
            
            date_default_timezone_set('Africa/Casablanca');

            $current_date = date('Y-m-d');
            $current_time = date('H:i:s');

            $timestamp_fin = strtotime($infos['date_f'] . ' ' . $infos['time_f']);
            
            $timestamp_actuel = strtotime($current_date . ' ' . $current_time);

            if($timestamp_actuel < $timestamp_fin){
                $obj1 = new infos_comptes_rendus;
                $result1 = $obj1->where($infos1);
                if($result1){
                     $timestamp_fin2 = strtotime($result1[0]->date_f . ' ' . $result1[0]->time_f);
                     if($timestamp_actuel > $timestamp_fin2){
                         $obj1->delete($infos1);
                         $obj1->insert($infos);
                     }
                     else{
                        ?>  <div class="container mt-5">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>vous avez deja definir un deadline pour ce module.</strong> 
                            </div>
                            </div> 
                        <?php
                     }
                }
                else{
                    
                    $obj1->insert($infos);
                }
                
            }
            else{
              ?>  <div class="container mt-5">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Date non valide.</strong> 
                  </div>
                </div> 
                <?php
            }
            
           
        }

        $this->view('ComptesRendusViews/DefinirDeadline', $modules);
    }

    public function Acceder(){
        if($_POST['Module'] == 'Choisissez une option'){
            header('Location: '. ROOT ."/". "ComptesRendusControl?message");
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data['Module'] = $_POST['Module'];
            $obj = new Compte_rendu;
            $result = $obj->where($data);
            
            $this->view('ComptesRendusViews/ListeComptesRendus', $result);
        }
        
    }
    
    public function Importer(){
        $niv = $_SESSION['Etudiant'][0]->Niveau;
        $data['Niveau'] = $niv;
        $obj = new Module;
        $result = $obj->where($data);
        for($i = 0; $i < count($result); $i++){
            $modules[$i] = $result[$i]->nom;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $obj = new infos_comptes_rendus;
            $dat['Module'] = $_POST['module'];
            
            $res = $obj->where($dat);
           
            date_default_timezone_set('Africa/Casablanca');

            $current_date = date('Y-m-d');
            $current_time = date('H:i:s');
            
            
            $timestamp_debut = strtotime($res[0]->date_d . ' ' . $res[0]->time_d);
            $timestamp_fin = strtotime($res[0]->date_f . ' ' . $res[0]->time_f);
            
            $timestamp_actuel = strtotime($current_date . ' ' . $current_time);

            if($timestamp_debut <= $timestamp_actuel && $timestamp_fin >= $timestamp_actuel){
                $data1['nom_prenom'] = $_SESSION['Etudiant'][0]->Nom .' '. $_SESSION['Etudiant'][0]->Prenom;
                
                $data1['Niveau'] = $_SESSION['Etudiant'][0]->Niveau;
                $data1['Module'] = $_POST['module'];
                $filename = $_FILES['fichier']['name'];
                $data1['File'] = $filename;
                $path = '../public/assets/ComptesRendus/' . $filename;
                move_uploaded_file($_FILES['fichier']['tmp_name'], $path);
                
                $obj = new Compte_rendu;
                $obj->insert($data1);
                
            }
            else{
                
                ?>  <div class="container mt-5">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ooops! vous avez depace le deadline</strong> 
                  </div>
                </div> 
                <?php
            }

            
        }
        $this->view('ComptesRendusViews/ComptesRendusEtd', $modules);
    }
}