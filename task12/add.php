<?php
require_once 'Database.php';
$db = Database::instance(); 
$sql = "INSERT INTO employees(name ,Address ,salary) VALUES(?,?,?)";
if(isset($_POST["submit"])) {
$param = [$_POST['name'] ,$_POST['address'],$_POST['salary']];
$result = $db->query($sql , $param);
header('Location:index.php');
}
echo "no";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
</head>
<body>

<form action="" method="POST">

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" required><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary" step="0.01" required><br><br>

    <button type="submit" name="submit">Add Employee</button>

</form>

</body>
</html>

