<?php

class Login{
    use Controller;
    
    function index(){
        
        if($_SERVER['REQUEST_METHOD']== "POST"){
            $user = new User;
            // if($user->validate($_POST)){
            //     $resulat = $user->first($_POST);

            //     Redirect('HomeEtd');
            // }
            $arr['Email'] = $_POST['Email'];
            $row = $user->first($arr);
            
            if($row){
                if($row[0]->password == $_POST['password']){
                    $_SESSION['USER']= $row;
                    if($row[0]->Role == 'Etudiant'){
                        $Etudiant = new Etudiant;
                        $data['Email'] = $_SESSION['USER'][0]->Email;
                        $result = $Etudiant->where($data);
                        $_SESSION['Etudiant'] = $result;
                        
                        Redirect('HomeEtd');
                    }
                    else if($row[0]->Role == 'Prof'){
                        $Professeur = new Prof;
                        $data['Email'] = $_SESSION['USER'][0]->Email;
                        $result = $Professeur->where($data);
                        $_SESSION['Professeur'] = $result;

                        Redirect('HomeProf');
                    }
                    else if($row[0]->Role == 'Admin'){
                        Redirect('HomeAdmin');
                    }
                }
                
            }
            $user->errors['email'] = "email ou password not valid";
            $data['errors'] = $user->errors;

            // if(!empty($resulat)){
            //     if($resulat[0]-> Role == 'Etudiant'){
                       
            //         Redirect('HomeEtd');
            //     }
            // }
            // else {
            //     // echo "email ou mot de passe incorrect";
            //     $er['email'] = "email ou mot de passe incorrect";
            // }

            // $ee['errors'] = $user->errors;            
        }
        
        
        // show($resulat[0]->Role);
        // show($resulat);
        // 
        if(empty($data)){
            $data = [];
        }
        $this->view('login',$data);
    }
}