<?php


class notes_par_Categorie
{
    use Model;

    protected $table = 'notes_par_categorie';
    protected $categorie;

    protected $allowedColumns;

    public function __construct($categrie = null)
    {
        $this->categorie = $categrie;   
        $this->allowedColumns = [ 'Etudiant', 'Module', 'Niveau', $this->categorie];
    }
    
    
}