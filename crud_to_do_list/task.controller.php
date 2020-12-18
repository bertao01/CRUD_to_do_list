<?php

require '../../crud_to_do_list/connection.php';
require '../../crud_to_do_list/task.model.php';
require '../../crud_to_do_list/task.service.php';

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if ($action == 'create'){
    $task = new Task();
    $task->__set('task', $_POST['task']);
    
    $connection = new connection();
    
    $taskService = new TaskService($connection, $task);
    $taskService->create();

    header('location:index.php?inclusion=1');
    
} else if ($action == 'read'){
    $task = new Task();
    $connection = new Connection();
    
    $taskService = new TaskService($connection, $task);
    $tasks = $taskService-> read();

} else if ($action == 'update'){
    $task = new Task();
    $task->__set('id', $_POST['id']);
    $task->__set('task', $_POST['task']);
    
    $connection = new Connection();
    
    $taskService = new TaskService($connection, $task);
    $taskService -> update();
    
    if($taskService->update()){
        header('location:index.php');
    }

}  else if ($action == 'delete'){
    print_r($_GET); 
    $task = new Task();
    $task->__set('id', $_GET['id']);
    
    $connection = new Connection();
    
    $taskService = new TaskService($connection,$task);
    $taskService->delete();
    
    header('location:index.php');
}

?>