<?php

class Annonces
{
    
    use Model;
    protected $table = 'Annonces';
    protected $allowedColumns = [ 'Objet', 'File', 'Niveau', 'Prof'];
    
    
}
