<?php
    session_start();

    if(isset($_POST['task']) && !empty($_POST['task']))
    {

         $_SESSION['task']=array();
         $_SESSION['task']=array_values($_SESSION['task']);
         array_push(($_SESSION['task']),($_POST['task']));
    }
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./main.css">
    <title>Todo List </title>
    </head>
<body>
    <div class="heading">
        <h1>TO-Do LIST</h1>
    </div>
    <form action="index.php" method="POST" >
    <input type="text" name="task" placeholder="Enter the Task" class="task_input"  id="task"/>
    <button type="submit" name="submit" class="add_task" >ADD TASK</button>
    </form>
    <?php if(isset($_SESSION['task'])&& !empty($_SESSION['task'])):
        ?>
    <h2>MY TASK<h2>
    <ul>
    <?php foreach($_SESSION['task'] as $task) :?>
    <li>
    <?php echo $task?>
    </li>

    <?php endforeach;?>
    </ul>
    <?php endif; ?>


    





</body>
</html>
