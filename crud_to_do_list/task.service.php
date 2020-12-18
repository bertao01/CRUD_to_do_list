<?php

class TaskService{
    //CRUD
    private $connection; 
    private $task;
    
    public function __construct(Connection $connection, Task $task){
        $this->connection = $connection ->connect();
        $this->task = $task;
    }
    
    public function create(){
        $query = 'insert into tb_tasks (task) values (:task)';
        $stmt=$this->connection->prepare($query);
        $stmt->bindValue(':task',$this->task->__get('task'));
        $stmt->execute();
    }
    
    public function read(){
        $query = '
            Select 
                t.id, s.status, t.task
            from 
                tb_tasks as t 
                left join tb_status as s on (t.id_status = s.id)';
        $stmt= $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function update(){
        $query = 'update tb_tasks set task = :task where id = :id ';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':task', $this->task->__get('task'));
        $stmt->bindValue(':id', $this->task->__get('id'));
        print_r($this->task);
        return $stmt->execute();
    
    }
    
    public function delete(){
        $query = 'delete from tb_tasks where id=:id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $this->task->__get('id'));
        $stmt->execute();
        
    }
    
}

?>