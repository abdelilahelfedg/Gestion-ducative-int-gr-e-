<?php

    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


Class ImportationControl {
    use Controller;
    public function validateName($name) {
        $pattern = "/^[a-zA-Z\s'-]+$/";
        return preg_match($pattern, $name);
    }

    public function existsInDatabase($row,$verif) {


    if($verif=='etud'){    
    $etu= new Etudiant;
    $Email=$row[0];
    // $verify=explode("@",$Email);
    // if(count($verify)!=2){
    //     return true;
    // }
    $data['Email']=$Email;
     return $etu->where($data) !== false;}
    else{
    $prof=new Prof;
    $Email=$row[0];
    $data['Email']=$Email;
    // if(count($verify)!=2){
    //     return true;
    // }  
    return $prof->where($data) !== false; 
    } 
   


    }
    public function generateRandomPassword() {
        // Liste des caractères 
        $characters = '0123456789';
        
        // Longueur du mot de passe
        $passwordLength = 8;
        
        // Initialiser le mot de passe vide
        $password = '';
    
        // Boucle pour générer chaque caractère du mot de passe
        for ($i = 0; $i < $passwordLength; $i++) {
            // Obtenir un caractère aléatoire de la liste 
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }
    
        // Retourner le mot de passe généré
        return $password;
    }
    public function saveToDatabase($row,$verif,&$data777) {
        $result=$this->existsInDatabase($row,$verif);
        if($verif=="etud"){
        $etu= new Etudiant;
        $Email=$row[0];
        $Nom=$row[1];
        $Prenom=$row[2];
        $Niveau=$row[3];
        $data['Email']=$Email;
        $data['Nom']=$Nom;
        $data['Prenom']=$Prenom;
        $data['Niveau']=$Niveau;
        if($result==false){
            $etu->insert($data);
            $data777['nb_ajoute']+=1;    

        }
        else{
            $etu->update($Email,$data,"Email");
            $data777['nb_modifie']+=1;

        }}
        else{
            $Email=$row[0];
            $Nom=$row[1];
            $Prenom=$row[2];
            $Niveau=$row[3];
            $prof=new Prof;
            $data['Email']=$Email;
            $data['Nom']=$Nom;
            $data['Prenom']=$Prenom;
            $data['Niveaux_Enseigne']=$Niveau;
            if($result==false){
                $prof->insert($data);
                $data777['nb_ajoute']++;    

            }
            else{
                $prof->update($Email,$data,"Email");
                $data777['nb_modifie']++;

    
            }
        }
    
    
    
    }
    public function index($verif=null){
        if($verif==null){
            Redirect('_404');
        }
        // if($_SESSION['USER'][0]->Role == 'Admin'){
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                $data777=[];
                if($_FILES['Excel']['error']==0){
                    $file=$_FILES['Excel']['tmp_name'];
                    $obj=PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                    $data=$obj->getActiveSheet()->toArray();
                    $data = array_filter($data, function($row) {
                        if (empty($row[0])) {
                            return false; // Retourne false pour supprimer cette ligne
                        }
                        return !empty(array_filter($row));
                    });
                    $cmpt=0;
                    foreach($data as $row){
                        $row = array_filter($row, function($value) {
                            return $value !== null && $value !== ''; // Supprimer les valeurs nulles ou vides
                        });
                        $cmpt++;
                        $data100['nombre']=$cmpt;
                            if(count($row) != 4) {

                                return $this->view('ImportationViews/pagePrincipal',$data100); // Passe à la prochaine itération de la boucle
                            }
                            // Passe à la prochaine itération de la boucle
            
                        if($row[0]==null || $row[1]==null || $row[2]==null || $row[3]==null){

                            return $this->view('ImportationViews/pagePrincipal',$data100); // Passe à la prochaine itération de la boucle
                            
                        }
                        $email=$row[0];
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                            return $this->view('ImportationViews/pagePrincipal', $data100);
                        } 
                        $firstName = $row[1]; // Supposons que le prénom est stocké dans $row['first_name']
                        $lastName = $row[2]; // Supposons que le nom est stocké dans $row['last_name']
                        if (!$this->validateName($firstName) || !$this->validateName($lastName)) {

                            return $this->view('ImportationViews/pagePrincipal', $data100);
                        }
                    }
                    $cmpt77=0;
                    $data9=[];
                    foreach($data as $row){
                        $cmpt77++;
                        $data9['alert']=$cmpt;
                        $user=new User;
                        $result=$user->query("SELECT * FROM login");
                        if(!empty($result)){
                            if($verif=='etud'){
                            foreach($result as $log){
                                if($log->Email==$row[0] && $log->Role!="Etudiant"){
                                    return $this->view('ImportationViews/pagePrincipal', $data9);
                                }}
                            }
                            else{
                                foreach($result as $log){
                                    if($log->Email==$row[0] && $log->Role!="Prof"){
                                        return $this->view('ImportationViews/pagePrincipal', $data9);
                                    }}
                            }
                        }
                        }
                    $data777['nb_modifie']=0;
                    $data777['nb_ajoute']=0;    
                    foreach($data as $row){
                    $this->saveToDatabase($row,$verif,$data777);
                    }

                }
                if($verif=="etud"){
                $etd=new Etudiant;
                $resultat=$etd->findAll();
                $log=new User;
                $data=[];
                foreach($resultat as $row){
                    $data['Email']=$row->Email;
                    $resu=$log->where($data);
                    if($resu==false){
                        $data['password']=$this->generateRandomPassword();
                        $data['Role']='Etudiant';
                        $log->insert($data);
                    }
                    else{
                    continue;
                    }

                }
            }
        else{
            $prof=new Prof;
            $resultat=$prof->findAll();
                $log=new User;
                $data=[];
            if($resultat!=false){    
            foreach($resultat as $row){
                // var_dump($row);
                $data['Email']=$row->Email;
                $resu=$log->where($data);
                if($resu==false){
                    $data['password']=$this->generateRandomPassword();
                    $data['Role']='Prof';
                    $log->insert($data);
                }
                else{
                continue;
                }

            }}
        }
        return $this->view('ImportationViews/pagePrincipal',$data777);

        }
        return $this->view('ImportationViews/pagePrincipal');
    }    
        
    
    
            
    // }
    public function ImporterEtud(){
        if($_SESSION['USER'][0]->Role == 'Admin'){

        $this->index('etud');}
        

    }
    public function ImporterProf(){
        if($_SESSION['USER'][0]->Role == 'Admin'){
        $this->index('prof');}
    }
}




?>
