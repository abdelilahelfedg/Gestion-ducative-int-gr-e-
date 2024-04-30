<?php
// main model class
trait Model
{
    use Database;
    
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "Email";
    public $errors = [];
    
    public function findAll(){
        
        $query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset"; 
        
        return $this->query($query);
    }

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
        
        $query .= " limit $this->limit offset $this->offset"; 
        
        $data = array_merge($data, $data_not);
        // $sa = array_values($data);
        // show($sa);
        // show($data);
        // echo $query;
        return $this->query($query, $data);
    }

    public function whe($data, $data_not= []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ".$keys[0] . "= :" . $keys[0] . " || " . $keys[1] . "= :". $keys[1];

        
        
        $query .= " limit $this->limit offset $this->offset"; 
        
        $data = array_merge($data, $data_not);
        // $sa = array_values($data);
        // show($sa);
        // show($data);
        // echo $query;
        return $this->query($query, $data);
    }

    function first($data, $data_not= []){
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
        
        $query .= " limit $this->limit offset $this->offset"; 
        
        $data = array_merge($data, $data_not);
        
        $result = $this->query($query, $data);
        if($result)
            return $result;
        return false;
    }
    function insert($data){
        
        /** remove unwanted data **/
        if(!empty($this->allowedColumns))
        {
            foreach($data as $key=>$value)
            {
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
             
        }

        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (". implode("," , $keys) .") VALUES (:" . implode(",:" , $keys) . ")";
            
        $this->query($query, $data);
        
    }
    function update($id, $data, $id_column = 'password'){
        
        /** remove unwanted data **/
        if(!empty($this->allowedColumns))
        {
            foreach($data as $key=>$value)
            {
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
             
        }
        
        $keys = array_keys($data);
       
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key){
            $query .= $key . "= :" . $key . " , ";
        }
        
        $query = trim($query, " , ");
        
        $query .= " WHERE $id_column = :$id_column " ;

        $data[$id_column] = $id;
        // echo $query;
        $this->query($query, $data);
    }
    function delete($id, $id_column = 'password'){
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        $this->query($query, $data);
    }
   
}

