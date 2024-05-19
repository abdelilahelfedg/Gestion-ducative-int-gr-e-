<?php

class Archive
{
    
    use Model;
    protected $table = 'Archive';
    protected $allowedColumns = [ 'Titre', 'Fichier', 'Origine', 'DateArch', 'timeArch'];

    public function where($data, $data_not= []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key){
            $query .= $key . "= :" . $key . " && ";
        }
        foreach ($keys_not as $key){
            $query .= $key . "= :" . $key . " && ";
        }

        $query = trim($query, " && ");
        
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    
}