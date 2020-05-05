<?php
    session_start();

    if (isset($_POST['reset'])) {
        session_unset();
        session_destroy();
        session_start();
    }
    

    if( !isset($_SESSION['task']))
    {

         $_SESSION['task']=array();
         $_SESSION['taskcompleted']=array();
  }
$_SESSION['task']=array_values($_SESSION['task']);
$_SESSION['taskcompleted']=array_values($_SESSION['taskcompleted']);


if ( isset( $_POST ) && !empty( $_POST ) )
{

    array_push( $_SESSION['task'], $_POST['task'] );
}
foreach ( $_SESSION['task'] as $completedTask ) {
    if ( isset( $_POST[$completedTask] ) ) {
      array_push($_SESSION['taskcompleted'], $completedTask);
      
    }
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
    <button type="submit" name="submit" class="add_task"  >ADD TASK</button>
    <button type="submit" name="reset"  class="reset_task">RESET</button>
    </form>
    <?php if ( !empty( $_SESSION['task'] ) ) :?>
    <h2>My Task :</h2>
    <ul>
    <?php foreach($_SESSION['task'] as $task) :?>
    <li>
    <input type="checkbox"  name="taskcompleted" id="taskcompleted"/>
    <?php echo $task?>
    <button>Delete</button>
    </li>
    <?php endforeach;?>
    </ul>
    <?php endif;?>
    <?php if(isset($_POST['taskcompleted'])&& !empty($_SESSION['taskcompleted'])) :?>
     <h2>Completed Task: </h2>
     <ul>
     <?php foreach($_SESSION['taskcompleted'] as $taskcompleted) :?>
     <li>
     <? php echo  $taskcompleted?>
     </li>
     <?php endforeach;?>
     </ul>
    <?php endif;?>


    



    





</body>
</html>
