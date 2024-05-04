<?php
class AbsenceControl{
    use Controller;
    public function filiere($result){
        $filiere=[];
        foreach($result as $object){
            array_push($filiere,$object->filière);

        }
        $filiere_affiches=array_unique($filiere);
        sort($filiere_affiches);
        return $filiere_affiches;
    }

    public function index(){
        //le 1er poste 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
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
            $prof=$_SESSION['Professeur'][0]->Email;
            $date=$_POST['date_absence'];
            $etd=$_POST['absent1'];
            
            $abs=new Absence;
            $max_nb_seance_query = "SELECT MAX(nb_seance) AS max_nb_seance FROM absence WHERE id_prof='$prof' and id_module='$module' and type_seance='$type' and niveau='$niveau'";
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
            $abs->setLimit(1);
            // $data1['nb_seance'] = "(SELECT MAX(nb_seance) FROM absence)";
            $resultat=$abs->where($data1);
            // var_dump($data1);
            $obj=$resultat[0];
            //insertion
            $data['id_prof']=$prof;
            $data['id_module']=$module;
            $data['niveau']=$niveau;
            $data['nb_seance']=($obj->nb_seance) +1;
            $data['date']=$date;
            $data['type_seance']=$type;
            if (empty($etd)) {
                // Aucun étudiant absent, insérer avec id_etud NULL
                $data['id_etud'] = NULL;
                $abs->insert($data);}
            foreach ($etd as $etudiant) {
                $data['id_etud'] = $etudiant;
                $abs->insert($data);
            }
            Redirect("AbsenceControl");  

            


        }}   

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
            $result['filière']=$this->filiere($result);
            $this->view('AbsencesViews/nav',$result);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST['module'] )){
            $id_module=$_POST['module'];
            $id_prof=$Email;
            $this->view('AbsencesViews/nav1');

            

        }}
} }
        public function Faire_Absence(){
            $chaine=$_SESSION['MODULE'];
            $partie=explode("/",$chaine);
            $module=$partie[0];
            $type=$partie[1];
            $niveau=$partie[2];
            $Etd=new Etudiant;
            $data['Niveau']=$niveau;
            $result=$Etd->where($data);
            $this->view('AbsencesViews/abs',$result);
            die();

             
} 
} 





?>