<?php

class Compte_rendu
{
    use Model;

    protected $table = 'comptes_rendus';
    protected $allowedColumns = [ 'nom_prenom', 'Niveau', 'Module', 'time_depot', 'File'];
}
