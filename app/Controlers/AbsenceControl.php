<?php
class AbsenceControl{
    use Controller;
    public function filiere($result){
        $filiere=[];
        foreach($result as $object){
            array_push($filiere,$object->Niveau);

        }
        $filiere_affiches=array_unique($filiere);
        sort($filiere_affiches);
        return $filiere_affiches;
    }
    public function voirMesAbsences(){
        if(isset($_POST['voir_absence'])){
            $etd=$_SESSION['USER'][0]->Email;
            $module=$_POST['module_abs'];
            $module1=new Module;
            $nom=$module1->query("SELECT nom FROM modules WHERE id_module=:id_module",['id_module'=>$module]);
            $abs=new Absence;
            $data['id_etud']=$etd;
            $data['id_module']=$module;
            $result=$abs->where($data);
            $result['nom']=$nom[0]->nom;
            return $this->view("AbsencesViews/voirmesabs",$result);
        }
        if($_SESSION['USER'][0]->Role == 'Etudiant'){
            $etud=new Etudiant;
            $email=$_SESSION['USER'][0]->Email;
            $result=$etud->query("SELECT * FROM etudiants WHERE Email=:Email",['Email'=>$email]);
            $niveau=$result[0]->Niveau;
            $module=new Module;
            $modules=$module->query("SELECT * FROM modules WHERE Niveau=:Niveau",['Niveau'=>$niveau]);
            return $this->view("AbsencesViews/MesAbs",$modules);
            

        }
        }

    public function index(){
        //le 1er poste 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST['passer'])){
                unset($_SESSION['absent']);
                Redirect("AbsenceControl");  
            }
            if(isset($_POST['retour_en_arriere'])){
               return  $this->view("AbsencesViews/nav1");
            }
            if(isset($_POST['module'] )){
            $id_module=$_POST['module'];
            // $id_prof=$Email;
            $_SESSION['MODULE']=$id_module;
            
            $this->view('AbsencesViews/nav1');
            die();
            // if(isset())
         }
         //2eme poste
        //  var_dump($_POST);
       
        if(isset($_POST['absent'])){
            $data=[];
            $chaine=$_SESSION['MODULE'];
            $partie=explode("/",$chaine);
            $module=$partie[0];
            $type=$partie[1];
            $niveau=$partie[2];
            
          /*  if($type=="TP"){
                $etd =new Etudiant;
                $result=$etd->query("SELECT * FROM Etudiant WHERE Niveau='$niveau'");
                $array=$this->groupe_tp($result);
               return  $this->view("AbsenceControl/TP",$array);
            }*/
            $prof=$_SESSION['Professeur'][0]->Email;
            $date=date("Y-m-d H:i:s");
            if(!empty($_POST['absent1'])){
            $etd=$_POST['absent1'];}
            $GRP_TP=null;
            if(isset($_SESSION['GRP_TP'])){
                $GRP_TP=$_SESSION['GRP_TP'];

            }
            if($type!="TP"){
                $GRP_TP=null;
                $max_nb_seance_query = "SELECT MAX(nb_seance) AS max_nb_seance FROM Absence WHERE id_prof='$prof' and id_module='$module' and type_seance='$type' and niveau='$niveau'";
                
            }
            else{
                $max_nb_seance_query = "SELECT MAX(nb_seance) AS max_nb_seance FROM Absence WHERE id_prof='$prof' and id_module='$module' and type_seance='$type' and niveau='$niveau' and GRP_TP=$GRP_TP";
            }    
            $abs=new Absence;
            $max_nb_seance_result = $abs->query($max_nb_seance_query);

// Vérifier si le résultat est vide (aucun enregistrement d'absence dans la base de données)
if (empty($max_nb_seance_result)) {
    // Aucun enregistrement d'absence, définir nb_seance à 1
    $data['nb_seance'] = 0;
} else {
    // Récupérer la valeur maximale de nb_seance
    $max_nb_seance = $max_nb_seance_result[0]->max_nb_seance;}

    // Ajouter la condition pour nb_seance

            $data1['nb_seance'] = $max_nb_seance;
            $data1['id_prof']=$prof;
            $data1['id_module']=$module;
            $data1['niveau']=$niveau;
            $data1['type_seance']=$type;
            if(isset($GRP_TP)){
            $data1['GRP_TP']=$GRP_TP;
            $abs->setLimit(1);
            // $data1['nb_seance'] = "(SELECT MAX(nb_seance) FROM absence)";
            $resultat=$abs->where($data1);}
            else{
                $abs->setLimit(1);
                // $data1['nb_seance'] = "(SELECT MAX(nb_seance) FROM absence)";
                $resultat=$abs->where($data1);
            }
            // var_dump($data1);
            if(!empty($resultat)){
            $obj=$resultat[0];}
            //insertion
            $data['id_prof']=$prof;
            $data['id_module']=$module;
            $data['niveau']=$niveau;
            if(empty($obj->nb_seance)){
            $data['nb_seance']=1;}
            else{
            $data['nb_seance']=$obj->nb_seance+1;}
            $data['date']=$date;
            $data['type_seance']=$type;
            $data['GRP_TP']=$GRP_TP;
            if (empty($etd)) {
                // Aucun étudiant absent, insérer avec id_etud NULL
                $data['id_etud'] = NULL;
                $abs->insert($data);}
            if(!empty($etd)){    
            foreach ($etd as $etudiant) {
                $data['id_etud'] = $etudiant;
                $abs->insert($data);
            }}
            // var_dump("---------------------");
            $data2['nb_seance']=$data['nb_seance'];
            $etd1=new Etudiant;
            $resultat=[];
            if(!empty($etd)){    
            foreach($etd as $etudiant){
                $data7['Email']=$etudiant;
                $query=$etd1->where($data7);
                $resultat[]=$query[0];
            }}
            $data2['etud']=$resultat;
            $data2['date']=$date;
            $data2['type']=$type;
            $data['GRP_TP']=$GRP_TP;
            // var_dump($data2);
            return $this->view("AbsencesViews/listeAbsent",$data2);
            // Redirect("AbsenceControl");  

            


        }}   
       /* if(empty($_SESSION) || $_SESSION['USER'][0]->Role != 'Prof' ){
            return$this->view("404");
        }*/
        if($_SESSION['USER'][0]->Role == 'Prof'){
            // var_dump($_SESSION['Professeur']);
            $Email=$_SESSION['Professeur'][0]->Email;

            $data['email_prof_cours']=$Email;
            $module=new Module;
            $result=$module->where($data);
            if($result==false){
            unset($tableau['email_prof_cours']);
            $data['email_prof_tp']=$Email;
            $result=$module->where($data);}
            // var_dump($result);
            // $filiere_affichees = array_column($result, 'filière');
            // var_dump($filiere_affichees);
            $result['filiere']=$this->filiere($result);
            $this->view('AbsencesViews/nav',$result);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST['module'] )){
            $id_module=$_POST['module'];
            $id_prof=$Email;
            $this->view('AbsencesViews/nav1');

            

        }}
} }
        //systeme de pagination 
        // public function pagination($niveau, $page) {
        //     $par_page = 10;
        //     $Etd = new Etudiant;
        //     $starter = ($page - 1) * $par_page;
        //     $tab = $Etd->query("SELECT * FROM etudiants WHERE Niveau =:Niveau ORDER BY Nom LIMIT " . (int)$starter . ", " . (int)$par_page . "", [
        //         'Niveau'=>$niveau
        //     ]);
        //     $total = $Etd->query("SELECT COUNT(*) as nb_total FROM etudiants WHERE Niveau =:Niveau ", [
        //         'Niveau'=>$niveau
        //     ]);
        //     $tab['nb_page'] = ceil($total[0]->nb_total / $par_page);
        //     return $tab;
        // }
        public function groupe_tp($result){
            $array=[];
            array_push($array,1);
            if(count($result)>30){
            array_push($array,2);
            }
            if(count($result)>70){
            array_push($result,3);    
            }
            if(count($result)>120){
            array_push($array,4);    
            }
            if(count($result)>170){
            array_push($array,5);    
            }
            return $array;
        }
        public function Faire_Absence(){
            // $accueil=$_GET['url'];
            // $url=explode("/",$accueil);
            // $accueil2=$url[2];
            // $pg=explode("=",$accueil2);
            // $page=$pg[1];
            $chaine=$_SESSION['MODULE'];
            $partie=explode("/",$chaine);
            $module=$partie[0];
            $type=$partie[1];
            $niveau=$partie[2];
            if(isset($_POST['TP2'])){
                $etd=new Etudiant;
                $grp=$_POST['TP3'];
                $total=$etd->query("SELECT COUNT(*) as total FROM etudiants");
                $result1=$etd->query("SELECT * FROM etudiants WHERE Niveau='$niveau'");
                $array=$this->groupe_tp($result1);
                $result=$this->select($grp,$total,$niveau,$array);
                $_SESSION['GRP_TP']=$grp;
                return  $this->view('AbsencesViews/abs',$result);

            }
            if($type=="TP"){
                $etd =new Etudiant;
                $result=$etd->query("SELECT * FROM etudiants WHERE Niveau='$niveau'");
                $array=$this->groupe_tp($result);
                return  $this->view("AbsencesViews/TP",$array);}
            $Etd=new Etudiant;
            $data['Niveau']=$niveau;
          /*  if(isset($_POST['TP'])){
                $grp=$_POST['TP1'];
                var_dump($grp);
            }*/
            $result=$Etd->query("SELECT * FROM etudiants WHERE Niveau=:Niveau ORDER BY Nom",$data);
            // $result=$this->pagination($niveau,$page);
            // var_dump($result);
            $this->view('AbsencesViews/abs',$result);
            die();

             
}
        public function NB_absence($result,$module,$niveau){
            $abs=new Absence;
            $abs->setLimit(200);
            if(empty($result)){
                $this->view("404");
                die();
            }
            for($i=0;$i<count($result);$i++){
                $nb_absence_tp=0;
                $nb_absence_cours=0;
                $data['id_etud']=$result[$i]->Email;
                $data['id_module']=$module;
                $data['niveau']=$niveau;
                $data['type_seance']="Cours";
                $resul=$abs->where($data);
                if(is_array($resul)){
                $nb_absence_cours=count($resul);}
                $result[$i]->nb_cours=$nb_absence_cours;
                $data['type_seance']="TP";
                $resul=$abs->where($data);
                if(is_array($resul)){
                $nb_absence_tp=count($resul);}
                else{
                $nb_absence_tp=0;    
                }
                $result[$i]->nb_tp=$nb_absence_tp;
                $result[$i]->nb_total=$nb_absence_cours+$nb_absence_tp;
            }
                
                return $result;
        }
        public function Voir_statistique(){
            $chaine=$_SESSION['MODULE'];
            $extrait=explode("/",$chaine);
            $module=$extrait[0];
            $type=$extrait[1];
            $niveau=$extrait[2];
            // var_dump($niveau);
            $Etd=new Etudiant;
            $data['Niveau']=$niveau;
            $result=$Etd->query("SELECT * FROM etudiants WHERE Niveau=:Niveau ORDER BY Nom",$data);
            $data=$this->NB_absence($result,$module,$niveau);
            $this->view('AbsencesViews/hzsh',$data);
            die();

        }
        
        public function Update(){
        

                // Validation des données POST
        
                // Récupération des informations de session
                $chaine = $_SESSION['MODULE'];
                $extrait = explode("/", $chaine);
                $module = $extrait[0];
                $type = $extrait[1];
                $niveau = $extrait[2];
                $prof = $_SESSION['Professeur'][0]->Email;
        
                // Requête pour obtenir les données de séance
                $Abs = new Absence;
                $data['id_prof'] = $prof;
                $data['id_module'] = $module;
                $data['type_seance'] = $type;
                $data['niveau'] = $niveau;
                if($type=="TP" && !isset($_POST['TP2']) && !isset($_POST['modifier_seance']) && !isset($_POST['absent_modif']) && !isset($_POST['supprimer'])){
                    $etd =new Etudiant;
                    $result=$etd->query("SELECT * FROM etudiants WHERE Niveau='$niveau'");
                    $array=$this->groupe_tp($result);
                    return  $this->view("AbsencesViews/TP",$array);}
       /*         if(isset($_POST['TP2']) ){
                    $data['GRP_TP']=$_POST['TP3'];
                    $_SESSION['GRP_TP1']=$_POST['TP3'];
                    $result = $Abs->query("SELECT DISTINCT nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and GRP_TP=:GRP_TP ORDER BY nb_seance", $data);
                   return $this->view("AbsencesViews/modifier", $result);

                 }
                else{ 
                              
                $result = $Abs->query("SELECT DISTINCT nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau ORDER BY nb_seance", $data);
                $this->view("AbsencesViews/modifier", $result);}*/
                
                if(isset($_POST['modifier_seance'])) {
                    // Traitement de la modification de la séance
                    if(isset($_POST['nb_seance'])){
                        $seance=$_POST['nb_seance'];
                        $_SESSION['session']=$seance;
                        $data['nb_seance']=$seance;
                        if($type=="TP"){
                            $data['GRP_TP']=$_SESSION['GRP_TP1'];

                            $absents = $Abs->query("SELECT id_etud FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and GRP_TP=:GRP_TP", $data);

                        }
                    else{
                    // Récupération des absents
                    $absents = $Abs->query("SELECT id_etud FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance ", $data);}
                    // var_dump($absents);
                    
                    // Récupération de tous les étudiants
                    $etd = new Etudiant;
                    if($type=="TP"){
                    $grp=$_SESSION['GRP_TP1'];
                    $total=$etd->query("SELECT COUNT(*) as total FROM etudiants");
                    $result1=$etd->query("SELECT * FROM etudiants WHERE Niveau='$niveau'");
                    $array=$this->groupe_tp($result1);
                    $etudiants=$this->select($grp,$total,$niveau,$array);}
                    else{
                    $etudiants = $etd->query("SELECT * FROM etudiants WHERE Niveau=:Niveau ORDER BY nom", ['Niveau' => $niveau]);}
                    
                    // Marquer les absences
                    foreach($etudiants as $etud) {
                        if($absents!=false){
                        foreach($absents as $absent) {
                            if($absent->id_etud == $etud->Email) {
                                $etud->absent = true;
                                break;
                            } else {
                                $etud->absent = false;
                            }
                        }}
                    }
                    // Afficher la vue pour la modification
                    return $this->view("AbsencesViews/modifierAbsence", $etudiants);}}
                    // if(isset($_POST['TP2']) ){
                    //     $data['GRP_TP']=$_POST['TP3'];
                    //     $_SESSION['GRP_TP1']=$_POST['TP3'];
                    //     $result = $Abs->query("SELECT DISTINCT nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and GRP_TP=:GRP_TP ORDER BY nb_seance", $data);
                    //    return $this->view("AbsencesViews/modifier", $result);
    
                    //  }
                    // else{ 
                                  
                    // $result = $Abs->query("SELECT DISTINCT nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau ORDER BY nb_seance", $data);
                    // $this->view("AbsencesViews/modifier", $result);}
                    if(isset($_POST['absent_modif'])){
                        $nb_seance=$_SESSION['session'];
                        $chaine=$_SESSION['MODULE'];
                        $partie=explode("/",$chaine);
                        $module=$partie[0];
                        $type=$partie[1];
                        $niveau=$partie[2];
                        $prof=$_SESSION['Professeur'][0]->Email;
                        if(!empty($_POST['absent1'])){
                            $etd=$_POST['absent1'];} 
                        $abs=new Absence;                        
                        $data['id_module']=$module;
                        $data['type_seance']=$type;
                        $data['niveau']=$niveau;
                        $data['id_prof']=$prof;
                        $data['nb_seance']=$nb_seance;
                        if($type=="TP"){
                            $data['GRP_TP']=$_SESSION['GRP_TP1'];
                            $result=$abs->where($data);  

                        }
                        else{
                        $result=$abs->where($data); } 
                        if(!empty($result)){
                            foreach($result as $etudiant){
                                if(empty($etudiant->id_etud)){
                                if($type!="TP"){
                               $abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance", ['id_prof' => $prof, 'id_module' => $module, 'type_seance' => $type, 'niveau' => $niveau,'nb_seance'=>$nb_seance]);}
                               else{
                                $grp=$_SESSION['GRP_TP1'];
                                $abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and GRP_TP=:GRP_TP", ['id_prof' => $prof, 'id_module' => $module, 'type_seance' => $type, 'niveau' => $niveau,'nb_seance'=>$nb_seance,'GRP_TP'=>$grp]);
                               }}}
                            foreach($result as $etudiant){
                                if($type!="TP"){
                               $abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and id_etud=:id_etud", ['id_prof' => $prof, 'id_module' => $module, 'type_seance' => $type, 'niveau' => $niveau,'nb_seance'=>$nb_seance,'id_etud'=>$etudiant->id_etud]);}
                               else{
                                $grp=$_SESSION['GRP_TP1'];
                                $abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and id_etud=:id_etud and GRP_TP=:GRP_TP", ['id_prof' => $prof, 'id_module' => $module, 'type_seance' => $type, 'niveau' => $niveau,'nb_seance'=>$nb_seance,'id_etud'=>$etudiant->id_etud,'GRP_TP'=>$grp]);
                               }}
                            }
                        if(!empty($result)){
                        foreach($result as $etudiant){
                            if($type!="TP"){
                           $abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and id_etud=:id_etud", ['id_prof' => $prof, 'id_module' => $module, 'type_seance' => $type, 'niveau' => $niveau,'nb_seance'=>$nb_seance,'id_etud'=>$etudiant->id_etud]);}
                           else{
                            $grp=$_SESSION['GRP_TP1'];
                            $abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and id_etud=:id_etud and GRP_TP=:GRP_TP", ['id_prof' => $prof, 'id_module' => $module, 'type_seance' => $type, 'niveau' => $niveau,'nb_seance'=>$nb_seance,'id_etud'=>$etudiant->id_etud,'GRP_TP'=>$grp]);
                           }}
                        }
                        if(!empty($etd)){
                        foreach($etd as $absent){
                            if($type=="TP"){
                            $abs->query("INSERT INTO Absence (id_prof, id_etud, id_module, niveau, nb_seance, date, type_seance,GRP_TP) VALUES (:id_prof, :id_etud, :id_module, :niveau, :nb_seance, :date, :type_seance,:GRP_TP)", [
                                'id_prof' => $prof,
                                'id_etud' => $absent,
                                'id_module' => $module,
                                'niveau' => $niveau,
                                'nb_seance' => $nb_seance,
                                'date' => empty($result[0]->date) ? date('Y-m-d H:i:s') : $result[0]->date,
                                'type_seance' => $type,
                                'GRP_TP'=> $grp
                            ]);}
                            else{
                                $abs->query("INSERT INTO Absence (id_prof, id_etud, id_module, niveau, nb_seance, date, type_seance) VALUES (:id_prof, :id_etud, :id_module, :niveau, :nb_seance, :date, :type_seance)", [
                                    'id_prof' => $prof,
                                    'id_etud' => $absent,
                                    'id_module' => $module,
                                    'niveau' => $niveau,
                                    'nb_seance' => $nb_seance,
                                    'date' => empty($result[0]->date) ? date('Y-m-d H:i:s') : $result[0]->date,
                                    'type_seance' => $type
                                ]);}
                            }
                        }

                            
                        
                        else{
                            if($type!="TP"){
                            $abs->query("INSERT INTO Absence (id_prof, id_etud, id_module, niveau, nb_seance, date, type_seance) VALUES (:id_prof, NULL, :id_module, :niveau, :nb_seance, :date, :type_seance)", [
                                'id_prof' => $prof,
                                'id_module' => $module,
                                'niveau' => $niveau,
                                'nb_seance' => $nb_seance,
                                'date' => empty($result[0]->date) ? date('Y-m-d H:i:s') : $result[0]->date,
                                'type_seance' => $type
                            ]);}
                            else{
                                $abs->query("INSERT INTO Absence (id_prof, id_etud, id_module, niveau, nb_seance, date, type_seance,GRP_TP) VALUES (:id_prof, NULL, :id_module, :niveau, :nb_seance, :date, :type_seance,:GRP_TP)", [
                                    'id_prof' => $prof,
                                    'id_module' => $module,
                                    'niveau' => $niveau,
                                    'nb_seance' => $nb_seance,
                                    'date' => empty($result[0]->date) ? date('Y-m-d H:i:s') : $result[0]->date,
                                    'type_seance' => $type,
                                    'GRP_TP'=> $grp
                                ]);
                            }
                        }

                        $data2['nb_seance']=$data['nb_seance'];
                        $etd1=new Etudiant;
                        $resultat=[];
                        if(!empty($etd)){    
                        foreach($etd as $etudiant){
                        $data7['Email']=$etudiant;
                        $query=$etd1->where($data7);
                        $resultat[]=$query[0];
                        }}
                         $data2['etud']=$resultat;
                         $data2['date']=empty($result[0]->date) ? date('Y-m-d H:i:s') : $result[0]->date;
                         $data2['type']=$type;
                         if($type=="TP"){
                            $data2['TP_GRP']=$grp;
                         }
            // var_dump($data2);
                         $this->view("AbsencesViews/listeAbsent",$data2);
                        //  Redirect("AbsenceControl");  
                         return;



                        
                    }
                    if (isset($_POST['supprimer'])) {
                    
                        // Traitement de la suppression de la séance
                        $params = [
                            'id_prof' => $prof,
                            'id_module' => $module,
                            'type_seance' => $type,
                            'niveau' => $niveau
                        ];
                    
                        if ($type != "TP") {
                            $max = $Abs->query("SELECT max(nb_seance) as nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau", $params);
                        } else {
                            $grp=$_SESSION['GRP_TP1'];
                            // Ajouter GRP_TP au tableau de paramètres seulement si $grp est défini et non nul
                            if (!empty($grp)) {
                                $params['GRP_TP'] = $grp;
                                $max = $Abs->query("SELECT max(nb_seance) as nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and GRP_TP=:GRP_TP", $params);
                            } else {
                                echo "Le groupe TP est vide ou nul.";
                                return;
                            }
                        }


                      
                        
                    
                        $nb = $_POST['nb_seance'];
                        if ($max[0]->nb_seance == $nb) {
                            if ($type != "TP") {
                                $Abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance", array_merge($params, ['nb_seance' => $nb]));
                            } else {
                                $Abs->query("DELETE FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and nb_seance=:nb_seance and GRP_TP=:GRP_TP", array_merge($params, ['nb_seance' => $nb]));
                            }
                        } else {
                            echo "Vous pouvez juste supprimer la dernière séance.";
                        }
                    
                        Redirect('AbsenceControl');
                    
                    
                    }
                    if(isset($_POST['TP2']) ){
                        $data['GRP_TP']=$_POST['TP3'];
                        $_SESSION['GRP_TP1']=$_POST['TP3'];
                        $result = $Abs->query("SELECT DISTINCT nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau and GRP_TP=:GRP_TP ORDER BY nb_seance", $data);
                       return $this->view("AbsencesViews/modifier", $result);
    
                     }
                    else{ 
                                  
                    $result = $Abs->query("SELECT DISTINCT nb_seance FROM Absence WHERE id_prof=:id_prof and id_module=:id_module and type_seance=:type_seance and niveau=:niveau ORDER BY nb_seance", $data);
                    $this->view("AbsencesViews/modifier", $result);}
                
            
        }
        public function select($groupe,$total,$niveau,$max){
            $etd=new Etudiant;
            $par_groupe=ceil($total[0]->total)/$max[count($max)-1];
            $starter = ($groupe - 1) * $par_groupe;
            

            $resultat = $etd->query("SELECT * FROM etudiants WHERE Niveau = :Niveau ORDER BY Nom LIMIT $par_groupe OFFSET $starter",
            [
                'Niveau' => $niveau,
            ]);

            return $resultat;
        }
        

        
        public function Detail(){
            $url=explode("/",$_GET['url']);
            if(empty($url[2])){
                $this->view("404");
                die();
            }
            $id_etud=$url[2];
            $etd=new Etudiant;
            $data['Email']=$id_etud;
            $result1=$etd->where($data);
            if($result1==false){
                $this->view("404");
                die();
            }
            $chaine=$_SESSION['MODULE'];
            $extrait=explode("/",$chaine);
            $module=$extrait[0];
            $niveau=$extrait[2];
            $abs=new Absence;
            $data1['id_etud']=$id_etud;
            $data1['id_module']=$module;
            $data1['niveau']=$niveau;
            $result=$abs->where($data1);
            $result['info']=$result1[0];
            // var_dump($result);
            $this->view("AbsencesViews/detail",$result);
            

        } 
} 





?>
