<?php

class ProfsControl{
    use Controller;

    public function index(){
        $obj1 = new Prof;
        if(isset($_GET['chercher'])){
            $x = '%' . $_GET['chercher'].'%';
            $result = $obj1->Like([$x]);
            
        }
        else{
            $result = $obj1->findAll();
        }
        
        $this->view("ProfsCRUDViews/ListeProfesseurs", $result);
    }

    public function delete(){
        $data['Email'] = $_GET['Email'];
        $data1['email_prof_cours'] = $_GET['Email'];
        $obj2 = new User;
        $obj2->delete($data); 
        $obj = new Prof;
        $obj->delete($data);

        $obj1 = new Module;
        $obj1->delete($data1);
          
        Redirect("/ProfsControl");
    }

    public function update(){
        $data['Email'] = $_GET['Email'];
        $obj0 = new Prof;
        $result0 = $obj0->where($data);
        $obj1 = new User;
        $result1 = $obj1->where($data);
        $dat['email_prof_cours'] = $_GET['Email'];
        $obj2 = new Module;
        $result = $obj2->where($dat);
        
        for($i = 0; $i < count($result); $i++){
             $list[$i] = $result[$i]->nom;
        }
        $module = implode('/', $list);
        $result0[0]->Modules_Enseigne = $module;
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data1['Email'] = $_POST['Email'];
            
            $result3 = $obj1->where($data1);
           
            if($result3 && ($result3[0]->ID != $result1[0]->ID)){
                ?><div class="container mt-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>cette professeur existe deja</strong>
                </div>
              </div><?php
            }
            else{
                $Niveau = $_POST['Niveaux_Enseigne'];
                $Niveaux = explode('/', $Niveau);
                for($i = 0; $i < count($Niveaux); $i++){
                    $data5[$i] = $Niveaux[$i];
                }
                $modules = explode('/', $_POST['Modules_Enseigne']);
                for($i = 0; $i < count($modules);$i++){
                    $data3[$i] = $modules[$i];
                }   
                
                
                    if(preg_match("/^[a-zA-Z-' ]+$/", $_POST['Nom']) && preg_match("/^[a-zA-Z-' ]+$/", $_POST['Prenom']) && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
                    
                        if(count($data3) > count($data5) || count($data3) < count($data5)){
                            ?><div class="container mt-5">
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>nombre de modules doit correspondre au nombre de Niveaux</strong>
                                  </div>
                            </div><?php
                        }  
                        else{
                            $data1['Nom'] = $_POST['Nom'];
                            $data1['Prenom'] = $_POST['Prenom'];
                            $data1['Niveaux_Enseigne'] = $_POST['Niveaux_Enseigne'];
                            $data2['Email'] = $_POST['Email'];
                            $obj0->updateEtd($result0[0]->ID, $data1);
                            
                            $obj1->updateEtd($result1[0]->ID, $data2);

                            $obj2->delete($dat);
                            for($i = 0; $i < count($modules);$i++){
                                $data4['nom'] = $data3[$i];
                                $data4['Niveau'] = $data5[$i];
                                $data4['email_prof_cours'] = $_POST['Email'];
                                $data4['email_prof_tp'] = $_POST['Email'];
                                $obj2->insert($data4);
                            }
  
                            // //Lire tout le contenu du fichier CSV
                            // if (($handle = fopen($file, 'r')) !== false) {
                            //     $csvData = [];
                                
                            //     // Lire chaque ligne du fichier CSV
                            //     while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                            //         // Si l'email correspond à l'ancien email, le remplacer par le nouvel email
                            //         if ($row[0] ==  $data['Email']) {
                            //             $row[0] =  $data2['Email'];
                            //         }
                            //         // Ajouter la ligne au tableau csvData
                            //         $csvData[] = $row;
                            //     }
                            //     // Fermer le fichier après la lecture
                            //     fclose($handle);
                                
                            //     // Ouvrir le fichier CSV en écriture (ceci efface le contenu existant)
                            //     if (($handle = fopen($file, 'w')) !== false) {
                            //         // Écrire chaque ligne modifiée dans le fichier CSV
                            //         foreach ($csvData as $row) {
                            //             if (fputcsv($handle, $row) === false) {
                            //                 trigger_error("Erreur fatale : Impossible d'écrire dans le fichier CSV.", E_USER_ERROR);
                            //             }
                            //         }
                            //         // Fermer le fichier après l'écriture
                            //         fclose($handle);
                                    
                            //     }
                                
                            // }
  
                            Redirect("/ProfsControl");
                        }      
                        
                    }else{
                        ?><div class="container mt-5">
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erreur! Donnees Invalides</strong>
                              </div>
                        </div><?php
                    }
                
            }
            
            
        }
        $this->view("ProfsCRUDViews/ModifierProf",$result0);
    }

    public function generateRandomPassword() {
        // Liste des caractères possibles pour le mot de passe
        $characters = '0123456789';
        
        // Longueur du mot de passe
        $passwordLength = 8;
        
        // Initialiser le mot de passe vide
        $password = '';
    
        // Boucle pour générer chaque caractère du mot de passe
        for ($i = 0; $i < $passwordLength; $i++) {
            // Obtenir un caractère aléatoire de la liste des caractères
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }
    
        // Retourner le mot de passe généré
        return $password;
    }
    public function ajout(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data1['Email'] = $_POST['Email'];
            $obj2 = new User();

            $result = $obj2->where($data1);
            if($result){
                ?><div class="container mt-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>cette professeur existe deja</strong>
                </div>
              </div><?php
            }else{
                $Niveau = $_POST['Niveaux_Enseigne'];
                $Niveaux = explode('/', $Niveau);
                for($i = 0; $i < count($Niveaux); $i++){
                    $data[$i] = $Niveaux[$i];
                }
                $modules = explode('/', $_POST['Modules_Enseigne']);
                for($i = 0; $i < count($modules);$i++){
                    $data3[$i] = $modules[$i];
                }   
               
                
                    if(preg_match("/^[a-zA-Z-' ]+$/", $_POST['Nom']) && preg_match("/^[a-zA-Z-' ]+$/", $_POST['Prenom']) && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
                        
                        if(count($data3) > count($data) || count($data3) < count($data)){
                            ?><div class="container mt-5">
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>nombre de modules doit correspondre au nombre de Niveaux</strong>
                                  </div>
                            </div><?php
                            
                        }
                        else{
                            $data1['Nom'] = $_POST['Nom'];
                            $data1['Prenom'] = $_POST['Prenom'];
                            $data1['Niveaux_Enseigne'] = $_POST['Niveaux_Enseigne'];
                            $data2['Email'] = $_POST['Email'];
                            $data5['Email'] = $_POST['Email'];
                            
                            $file = './assets/images/mdp.txt';
                            
                            $password = $this->generateRandomPassword();
                            $data5['password'] = $password;
                            $data5['Role'] = "Prof";
                            
                             $hash = password_hash($password, PASSWORD_DEFAULT);
                    
                            $data2['password'] = $hash;
                            
                            $handle = fopen($file, 'a');
                          
                            // Vérifier si l'ouverture du fichier a réussi
                            if ($handle !== false) {
                                // Écrire les données dans le fichier CSV
                                fputcsv($handle, $data5);
                            
                                // Fermer le fichier
                                fclose($handle);
                                
                            }
                            
                            
                            $data2['Role'] = "Prof";
                            
                            $obj2->insert($data2);
                            
                            $obj1 = new Prof(); 
                            $obj1->insert($data1);
                            
                            $obj3 = new Module;
                            for($i = 0; $i < count($modules);$i++){
                                $data4['nom'] = $data3[$i];
                                $data4['Niveau'] = $data[$i];
                                $data4['email_prof_cours'] = $_POST['Email'];
                                $data4['email_prof_tp'] = $_POST['Email'];
                                $obj3->insert($data4);
                            }
                           
                            Redirect("/ProfsControl");
                        }
                        
                        
                    }
                    else{
                        ?><div class="container mt-5">
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erreur! Donnees Invalides</strong>
                              </div>
                        </div><?php
                    }
                
            }
            
        }
        
        $this->view("ProfsCRUDViews/AjouterProf");
    }
}
