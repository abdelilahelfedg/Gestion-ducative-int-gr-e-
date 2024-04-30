<?php

class Prof
{
    
    use Model;
    protected $table = 'Professeur';
    // protected $allowedColumns = [ 'Email', 'password',];
    
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