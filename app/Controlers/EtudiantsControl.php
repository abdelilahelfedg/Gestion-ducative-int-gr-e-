<?php

class EtudiantsControl{
    use Controller;

    public function index(){
        $obj1 = new Etudiant;
        if(isset($_GET['chercher'])){
            $x = '%' . $_GET['chercher'].'%';
            $result = $obj1->Like([$x]);
            
        }
        else{
            $result = $obj1->findAll();
        }
        
        
        $this->view("EtudiantsCRUDViews/ListeEtudiants", $result);
    }

    public function delete(){
        $data['Email'] = $_GET['Email'];
        $obj = new Etudiant;
        $obj->delete($data);
        $obj2 = new User;
        $obj2->delete($data);   
        
        Redirect("/EtudiantsControl");
    }

    public function update(){
        $data['Email'] = $_GET['Email'];
        $obj = new Etudiant;
        $result0 = $obj->where($data);
        $obj1 = new User;
        $result1 = $obj1->where($data);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $data1['Email'] = $_POST['Email'];
            
            $result3 = $obj1->where($data1);
                if($result3 && $result3[0]->ID != $result1[0]->ID){
                    ?><div class="container mt-5">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>cette Etudiant existe deja</strong>
                    </div>
                </div><?php
                }
                else{
                    if(preg_match("/^[a-zA-Z-' ]+$/", $_POST['Nom']) && preg_match("/^[a-zA-Z-' ]+$/", $_POST['Prenom']) && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
               
                    $data1['Nom'] = $_POST['Nom'];
                    $data1['Prenom'] = $_POST['Prenom'];
                    $data1['Niveau'] = $_POST['Niveau'];
                    $data2['Email'] = $_POST['Email'];
                    $obj->updateEtd($result0[0]->ID, $data1);
                    $obj1->updateEtd($result1[0]->ID, $data2);
    
                    Redirect("/EtudiantsControl");
                
                
                    }else{
                        ?><div class="container mt-5">
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erreur! Donnees Invalides</strong>
                              </div>
                        </div><?php
                    }
                }

            
        }
        $this->view("EtudiantsCRUDViews/modifierEtd",$result0);
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
            $obj2 = new User();
            $data['Niveau'] = $_POST['Niveau'];
            
            
            if(preg_match("/^[a-zA-Z-' ]+$/", $_POST['Nom']) && preg_match("/^[a-zA-Z-' ]+$/", $_POST['Prenom']) && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
                $data1['Email'] = $_POST['Email'];
                $result1 = $obj2->where($data1);
                if($result1){
                    ?><div class="container mt-5">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>l'Etudiant existe deja</strong>
                    </div>
                   </div><?php
                }else{
                    $data1['Nom'] = $_POST['Nom'];
                    $data1['Prenom'] = $_POST['Prenom'];
                    $data1['Niveau'] = $_POST['Niveau'];
                    $data2['Email'] = $_POST['Email'];
                    $data2['Role'] = "Etudiant";
                     $data5['Email'] = $_POST['Email'];
                            
                            $file = './assets/images/mdp.txt';
                            
                            $password = $this->generateRandomPassword();
                            $data5['password'] = $password;
                            $data5['Role'] = "Etudiant";
                            
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
                    
                    $obj2->insert($data2);
                    $obj1 = new Etudiant();
                    $obj1->insert($data1);
                    
                    Redirect("/EtudiantsControl");
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
        
        $this->view("EtudiantsCRUDViews/ajouterEtd");
    }
}

