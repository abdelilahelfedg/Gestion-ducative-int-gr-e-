<?php

class NotesControl
{
    use Controller;
    public function index(){
        if(!isset($_SESSION['USER'])){
            
            header('Location: '. ROOT);
        }
        
        $niveaux = $_SESSION['Professeur'][0]->Niveaux_Enseigne;
        $Arg = explode("/", $niveaux);
        
        $email = $_SESSION['Professeur'][0]->Email;
        $de['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            
            
        $data['email_prof_cours'] = $email;
            
        $obj = new Module;
        $result = $obj->where($data);
        for($i = 0; $i < count($result); $i++){
            $modules[$i] = $result[$i]->nom;
        }                
          
            $this->view('NotesViews/NotesViewProf', $modules);
    }
    
    public function Saisir(){

        $email = $_SESSION['Professeur'][0]->Email;
        $de['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            
            
        $data['email_prof_cours'] = $email;
            
        $obj = new Module;
        $result = $obj->where($data);
        for($i = 0; $i < count($result); $i++){
            $modules[$i] = $result[$i]->nom;
        }  
        
        
        for($i=0 ; $i < count($modules); $i++){
            $Arg[$i] = $modules[$i];
            
        }
        $Arg[count($Arg)] = "Examen";
        $Arg[count($Arg)] = "DS";
        $Arg[count($Arg)] = "Control";
        $Arg[count($Arg)] = "Projet";
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
            
            
                $Categorie = $_POST['Categorie'] . '_note' ;
                $obj2 = new Notes_par_categorie($Categorie);
                $data1['Module'] = $_POST['Module'];
                for($i = 0; $i < count($result); $i++){
                    if($result[$i]->nom == $data1['Module']){
                        $data1['Niveau'] = $result[$i]->Niveau;
                    }
                }
                
                $result = $obj2->where($data1);
                if($result){
                    $data1[$Categorie] = -1;
                    $result1 = $obj2->where($data1);
                
                    if( $result1 ){
                        $url  = ROOT .'/'. 'NotesControl/Afficher/?Niveau=' . $data1['Niveau'] . '&Categorie=' . $_POST['Categorie'] . '&Module=' . $_POST['Module'];
                        header('Location: '. $url);
                        exit;
                    }else{
                        ?>
                        <div class="container mt-5">
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreur</strong> <?= "vous avez deja rempli les notes." ?>
                          </div>
                        </div>
                        <?php
                    }
                }
                else{
                    $url  = ROOT . '/' . 'NotesControl/Afficher/?Niveau=' . $data1['Niveau'] . '&Categorie=' . $_POST['Categorie'] . '&Module=' . $_POST['Module'];
                    header('Location: '. $url);
                    exit;
                }
                
                


            
            
            
            
        }
        $this->view('NotesViews/SaisirNotes', $Arg);
    }

    public function Modifier(){
   
        
        $email = $_SESSION['Professeur'][0]->Email;
        $de['Prof'] = $_SESSION['Professeur'][0]->Nom .' '. $_SESSION['Professeur'][0]->Prenom;
            
            
        $data['email_prof_cours'] = $email;
            
        $obj = new Module;
        $result = $obj->where($data);
        for($i = 0; $i < count($result); $i++){
            $modules[$i] = $result[$i]->nom;
        }  
        
        
        for($i=0 ; $i < count($modules); $i++){
            $Arg[$i] = $modules[$i];
            
        }
        $Arg[count($Arg)] = "Examen";
        $Arg[count($Arg)] = "DS";
        $Arg[count($Arg)] = "Control";
        $Arg[count($Arg)] = "Projet";
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data1['Module'] = $_POST['Module'];
            for($i = 0; $i < count($result); $i++){
                if($result[$i]->nom == $data1['Module']){
                    $data1['Niveau'] = $result[$i]->Niveau;
                }
            }
            
                
            $url  = ROOT .'/'. 'NotesControl/AfficherUpdate/?Niveau=' . $data1['Niveau'] . '&Categorie=' . $_POST['Categorie'] . '&Module=' . $_POST['Module'];
            header('Location: '. $url);
            exit;                    
           
            
            
        }
        $this->view('NotesViews/SaisirNotes', $Arg);
    } 
    
    public function Afficher(){
        
            $data['Niveau'] = $_GET['Niveau'];
            
            
            
            $obj2 = new Etudiant;
            $result = $obj2->where($data);
            $list[0] = $_GET['Categorie'];
            for($i = 1; $i < count($result)+1; $i++){
                $list[$i] = $result[$i-1]->Nom . ' ' . $result[$i-1]->Prenom;
            }

            $Categorie = $list[0] . '_note' ;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $obj = new Notes_par_categorie($Categorie);
                
                for($i = 1; $i < count($result)+ 1; $i++){
                    $data1['Etudiant'] = $list[$i];
                    $data1['Module'] = $_GET['Module'];
                    $data2['Etudiant'] = $list[$i];
                    $data2['Module'] = $_GET['Module'];
                    $data1['Niveau'] = $_GET['Niveau'];
                    $data1[$Categorie] = $_POST['note'][$i-1];
                    $data3[$Categorie] = $_POST['note'][$i-1];

                    $result1 = $obj->where($data2);
                    if($result1){
                        $obj->update2($data3,$data2);
                    }
                    else{
                        $obj->insert($data1);
                    }
                    

                    
                }
                $url  = ROOT .'/'. 'NotesControl/Saisir?message';
                header('Location: '. $url);
                exit;
                
            }
            

                
              
            $this->view('NotesViews/ListeEtd', $list);
    }

    public function AfficherUpdate(){
        
        $data['Module'] = $_GET['Module'];
        $data['Niveau'] = $_GET['Niveau'];
        $Categorie = $_GET['Categorie'] . '_note' ;
        $obj1 = new Notes_par_categorie($Categorie);
        $result = $obj1->where($data);
        $Etudiants['categorie'] = $_GET['Categorie'];
        for($i = 0; $i < count($result);$i++){
            $Etudiants[$result[$i]->Etudiant] = $result[$i]->$Categorie;
            
        }
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
            for($i = 0; $i < count($result); $i++){
                $data2[$Categorie] = $_POST['note'][$i];
                $obj1->update($result[$i]->Etudiant, $data2 );
                
            }
            $url  = ROOT .'/'. 'NotesControl/Modifier?message';
            header('Location: '. $url);
            exit;
            
        }
      
        

            
          
        $this->view('NotesViews/ListeModifier', $Etudiants);
    }

    public function ChoixModule(){
        $email = $_SESSION['Professeur'][0]->Email;
        $data['email_prof_cours'] = $email;
            
        $data1['Module'] = $_POST['Module'];
        $obj = new Module;
        $result1 = $obj->where($data);
        for($i = 0; $i < count($result1); $i++){
            if($result1[$i]->nom == $data1['Module']){
                $data1['Niveau'] = $result1[$i]->Niveau;
            }
        }
        
        
        $obj = new Notes_par_categorie();
        $result = $obj->first2($data1);
        $data2 = [];
        $data2[0] = $data1['Module'];
        $data2[1] = $data1['Niveau'];
        $i = count($data2);
        foreach ($result as $key => $value){
           if($value != -1){
             $data2[$i] = $key;
             $i++;
           }
        }

        if($result->DS_note == -1 || $result->Examen_note == -1){
            $url = ROOT .'/'. 'NotesControl?message2';
                
            header('Location:'. $url);
            exit;   
        }
        
        $this->view('NotesViews/SaisiePourcentage', $data2);
    }
    public function SaisirPourcentage(){
        $data1['Module'] = $_GET['Module'];
        $data1['Niveau'] = $_GET['Niveau'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pourcentage = $_POST;
            
            $somme = 0;
            foreach ($pourcentage as $key => $value){
                $somme += $value;
            }
            if($somme != 100 ){
                $url = ROOT .'/'. 'NotesControl?message';
                
                header('Location:'. $url);
                exit;
            }                         

            
            $obj = new Notes_par_categorie();
            $result = $obj->where2($data1);
            
            $Moyenne = [];
            $somme = 0;
            for($j=0; $j<count($result);$j++){
                $i=0;
                foreach ($result[$j] as $key => $value){
                    if($value != -1){
                        $somme += $value * $pourcentage['pourcentage'.$i]/100; 
                        $i++;
                    }
                }
                $Moyenne[$j] = $somme;
                $somme = 0;
            }
            
            
            $result2 = $obj->where($data1);
            
            for($i= 0; $i<count($result2);$i++){
                $data['Etudiant'] = $result2[$i]->Etudiant;
                $data['Module'] = $result2[$i]->Module;
                $data['Niveau'] = $result2[$i]->Niveau;
                $data2['Moyenne'] = $Moyenne[$i];
                $obj->update2($data2, $data);
            }
            $url = ROOT .'/'. 'NotesControl?message3';
                
            header('Location:'. $url);
            exit;   
        }
        
        $this->view('NotesViews/SaisiePourcentage', $data2);
    }

    public function AfficherNotes(){
       
        $data1['Etudiant'] = $_SESSION['Etudiant'][0]->Nom ." ". $_SESSION['Etudiant'][0]->Prenom;
        $data1['Niveau'] = $_SESSION['Etudiant'][0]->Niveau;
        
       
        $obj = new Notes_par_categorie();
        $result = $obj->whereNotes($data1);
        if($result){
            $i = 0; 
        $list = ['Control_note', 'Projet_note', 'DS_note', 'Examen_note', 'Moyenne'];
        $list2 = [];
        $data3 = $list;
        for($i= 0; $i<count($result); $i++){
            $j=0;
            foreach($result[$i] as $key => $value){
                $data2[$i] = $result[$i]->Module;
                foreach($list as $type_note){
                    if($key == $type_note){
                        $list2[$j] = $value;
                        $j++;
                    }
                }
                 
            }
            
            $data3[$data2[$i]] = $list2;
            
            
            $moyenne = [];
            $x = 0;
            if(count($result) >= 6){
                for($i=0; $i<count($result); $i++){
                    if($result[$i]->Moyenne != -1){
                         $moyenne[$i] = $result[$i]->Moyenne;  
                    }
                    else{
                         $x = 1;
                         break;
                    }
                }
            }
            
            if(count($result) < 6 || $x == 1){
                $data3['moyenne_general'] = "n'est pas disponible ";
            }
            else{
                $moyenne_general = 0;
                for($i = 0; $i< count($moyenne); $i++){
                    $moyenne_general += $moyenne[$i];
                }
                $moyenne_general = $moyenne_general / count($moyenne);
                $data3['moyenne_general'] = $moyenne_general;
            }
        }
       
        $this->view('NotesViews/AfficherNotes', $data3);
        }
        else{
            
            $url = ROOT .'/'. 'HomeEtd?message4';
                
            header('Location:'. $url);
            exit; 
        }
        
    }
            
}
