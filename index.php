<?php
     session_start();
    if (isset($_POST['reset'])) {
        unset($_SESSION['task']);
        unset($_SESSION['taskcompleted']);
    }
    else{
    if( !isset($_SESSION['task']))
    {
        $_SESSION['task']=array();
     }
     if(!isset($_SESSION['taskcompleted']))
     {
        $_SESSION['taskcompleted']=array();
     }
$_SESSION['task']=array_values($_SESSION['task']);
$_SESSION['taskcompleted']=array_values($_SESSION['taskcompleted']);


if ( isset( $_POST['submit']) && !empty( $_POST['task']) )
{

    array_push( $_SESSION['task'], $_POST['task'] );
    
    
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
    <form action="./index.php" method="POST" >

    <input type="text" name="task" placeholder="Enter the Task" class="task_input"  />
    <button type="submit" name="submit" class="add_task"  >ADD TASK</button>
    <button type="submit" name="reset"  class="reset_task">RESET</button>
    </form>
    <?php if ( !empty( $_SESSION['task'] ) ) :?>
    <h2>My Task :</h2>
    <ul>
    <?php foreach($_SESSION['task'] as $taskvalue) :?>
    <li>
    <input type="checkbox"  name="taskcompleted[]" value=<?php $taskvalue?>  /> 
    <?php echo $taskvalue?> 
   </li>
   <?php endforeach;?>
    </ul>
    <?php endif;?>
    
    

    <pre>
    <strong>$_POST contents:</strong>
    <?php var_dump($_POST); ?>
  </pre>
  <pre>
    <strong>$_SESSION contents:</strong>
    <?php var_dump($_SESSION); ?>
  </pre>

    



    





</body>
</html>
