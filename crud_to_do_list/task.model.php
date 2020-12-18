<?php

class Task{
    // MySQL table columns
    private $id;
    private $id_status;
    private $task;
    private $date;
    
    public function __get($attribute){
        return $this->$attribute;
    }
    
    public function __set($attribute, $value){
        $this->$attribute = $value;
    }
}

?>