<?

$action = 'read';
require 'public.controller.php';

/*
debugging
echo $action;

echo '<pre>';
print_r($tasks);
echo '<pre>';
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD to do list</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<section class="app">
    <div class="title">
        <h1>CRUD to do list</h1>
    </div>
    
    <div class="content" >
    
        <form action="public.controller.php?action=create" method="POST">
            <label>Please fill your to do list</label>
            <input type="text" class="task" name="task" placeholder="ex: walk the dog">
            <button class="btn">Add</button>
            <? if(isset($_GET['inclusion']) && $_GET['inclusion']==1){ ?>            
                <p style="color:#5cb85c;">Task successfully inserted !</p>
            <?}?>
        </form>
        
        <div class="list">
            <? foreach($tasks as $key => $task ){ ?>
                <p class="center" id='<?=$task->id?>' > <?= $task->task; ?> </p>
                <div class="action_buttons">
                    <button class="btn btn-success" onclick="cross('<?=$task->id?>')">done</button>
                    <button class="btn btn-primary" onclick="edit('<?=$task->id?>','<?=$task->task?>')" >edit</button>
                    <button class="btn btn-danger" onclick="del(<?=$task->id?>)"> delete</button>
                </div>
                <hr>
            <? } ?>
        </div>
    </div>
</section>

<footer class="footer">
    <p>Designed by Victor Bertão</p>
</footer>

</body>
</html>