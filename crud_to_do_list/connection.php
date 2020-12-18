<?php

class Connection {

    private $host='localhost'; 
    private $dbname='crud_to_do_list';
    private $user='root';
    private $pass='';

    public function connect(){
        try{
            $connection = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass" 
            );
            
            return $connection;
        
        } catch (PDOException $e){
        
        echo '<p>' . $e->getMessage() . '</p>';
        
        }
    }
}
?>