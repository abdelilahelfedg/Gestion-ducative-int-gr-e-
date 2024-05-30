<?php


class Notes_par_categorie
{
    use Model;

    protected $table = 'Notes';
    protected $categorie;

    protected $allowedColumns;

    public function __construct($categrie = null)
    {
        $this->categorie = $categrie;   
        $this->allowedColumns = [ 'Etudiant', 'Module', 'Niveau', $this->categorie];
    }
    
    
}
