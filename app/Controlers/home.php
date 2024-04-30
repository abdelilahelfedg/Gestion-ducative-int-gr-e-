<?php

class home{
    
    use Controller;

    public function index($a = '',$b = '', $c = ''){
       
        // $usr = new User;
        
        // $sa = new Post();
        // $sa->salut();
        // $arr['Nom_utilisateur'] = 'jaal';
        // $arr['motdepasse'] = 5050;
        // $arr['Nom_utilisateur'] = 'moffffd';
        // $result = $usr->where(['motdepasse' => 5050]);
        // show($result);
        
        echo "<br>this is the home controller.";
        $this->view('home');
        
    }

}

