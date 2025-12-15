<?php
session_start();

if (isset($_POST['task']) && empty($_SESSION['tasks']) ) {
    $_SESSION['tasks'] =[];
    echo "initialized";
}
  $_SESSION['tasks'][] = $_POST['task'];

header("Location: task4HTML.php");
// session_destroy() ;

?>