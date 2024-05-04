<?php

class Absence
{
    
    use Model;
    protected $table="absence";
    protected $allowedColumns = [ 'id_prof', 'id_etud', 'id_module', 'niveau','nb_seance','date','type_seance','justification'];
    public function setLimit($limit) {
        $this->limit = $limit;
    }

    // Setter pour $offset
    public function setOffset($offset) {
        $this->offset = $offset;
    }

    // Setter pour $order_type
    public function setOrderType($order_type) {
        $this->order_type = $order_type;
    }

    // Setter pour $order_column
    public function setOrderColumn($order_column) {
        $this->order_column = $order_column;
    }
    public function Validate($data){
         $this->errors = [];
         if(empty($data['Email'])){
             $this->errors['Email'] = "email is required";
        }else
        if(!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)){
            $this->errors['Email'] = "email is not valid";
        } 
        if(empty($data['password'])){
            $this->errors['password'] = "password is required";
       }
         if(empty($this->errors)){
            return true;
         }
         return false;
    }
}