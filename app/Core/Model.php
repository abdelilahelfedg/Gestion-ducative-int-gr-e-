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

    public function whereNd(){

        $query = "select * from $this->table";

        return $this->queryNd($query);
    }

    private function queryNd($query){ 
        
        $con = $this->connect();
        $stmt = $con->prepare($query);
        $check = $stmt->execute();

        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)){
                return $result;
            }
        }
        return false;
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

        return $this->query($query, $data);
    }

    public function whe($data, $data_not= []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ".$keys[0] . "= :" . $keys[0] . " || " . $keys[1] . "= :". $keys[1];

        $query .= " limit $this->limit offset $this->offset"; 
        
        $data = array_merge($data, $data_not);

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
    
    public function insert($data){
        $con = $this->connect();

        $columns = implode(', ', array_keys($data)); #--> error
        $values = implode(', ', array_fill(0, count($data), '?'));
    
        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";
        
        $stmt = $con->prepare($query);

        $stmt->execute(array_values($data));

        return $stmt->rowCount() > 0;
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

        $this->query($query, $data);
    }
    function delete($id, $id_column = 'password'){
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        $this->query($query, $data);
    }

    public function count($field = '', $name_field = ''){

        $query = "  SELECT COUNT(*) AS count FROM $this->table WHERE `$field` = :name_field";
        if($field == '' && $name_field == ''){
            $query = "SELECT COUNT(*) AS count FROM $this->table";
        }
        $result = $this->query($query, [':name_field' => $name_field])[0];

        return $result->count;
        
    }

    public function moveRows($source, $destin, $condition = '') {

        $con = $this->connect();
        $query = "INSERT INTO $destin SELECT * FROM $source";
        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }
        $stmt = $con->prepare($query);
        $check = $stmt->execute();

        if ($check) {
            return true;
        } else {
            return false;
        }
    }
    function check(){
        return $this->where($criteria)->exists();
    }
}

