<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form action="task4.php" method="POST">
    add task <input type='text' name='task' placeholder='your task' > <br><br>
    <button type='submit'>Add Task</button>
</form>
<br><br><br>
<?php


echo "<h2>Your Tasks:</h2>";

echo "<ul>"; 
session_start();
foreach ($_SESSION['tasks'] as $task) {
    echo "<li>" . htmlspecialchars($task) . "</li>";
}

echo "</ul>";
?>
</body>
</html>