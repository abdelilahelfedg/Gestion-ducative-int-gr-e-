<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


Class ImportationControl {
    use Controller;
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
        // Liste des caractères possibles pour le mot de passe
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
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
    public function saveToDatabase($row,$verif) {
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
        }
        else{
            $etu->update($Email,$data,"Email");

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
            }
            else{
                $prof->update($Email,$data,"Email");
    
            }
        }
    
    
    
    }
    public function index($verif=null){
        if($verif==null){
            Redirect('_404');
        }
        // if($_SESSION['USER'][0]->Role == 'Admin'){
            $this->view('ImportationViews/pagePrincipal');
            if($_SERVER['REQUEST_METHOD']== 'POST'){
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
                    foreach($data as $row){
                        $row = array_filter($row, function($value) {
                            return $value !== null && $value !== ''; // Supprimer les valeurs nulles ou vides
                        });
                    
                        if(count($row)!=4) {
                        echo "les données sont erronées ";    
                        return; // Passe à la prochaine itération de la boucle
                        }
                        if($row[0]==null || $row[1]==null || $row[2]==null || $row[3]==null){
                            echo "les données sont erronées";
                            return;
                        }
                        $email=explode("@",$row[0]);
                        if(count($email)!=2){
                        echo "erreur au niveau des données sont maldéfiniés ";
                        return;}
                    }
                    foreach($data as $row){
                    $this->saveToDatabase($row,$verif);
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
                die();
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
            die();
        }
        }}    
        
    
    
            
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