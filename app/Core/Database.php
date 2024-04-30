<?php

trait Database
{
    private function connect(){
        $string = 'mysql:hostname='.DBHOST.';dbname='.DBNAME;
        $connect = new PDO ($string, DBUSER, DBPASS);
        return $connect;
    }

    public function query($query, $data = []){  // separate query to variables
        
        $con = $this->connect();
        $stmt = $con->prepare($query);
        // $email = $data['email'];
        // $pas = $data['pass'];
        $check = $stmt->execute($data);
        
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result;
            }
        }
        return false;
    }
    public function get_row($query, $data = []){  // separate query to variables
        $con = $this->connect();
        $stmt = $con->prepare($query);
        $check = $stmt->execute($data);
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result[0];
            }
        }
        return false;
    }
}

