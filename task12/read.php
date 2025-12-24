<?php

require_once 'Database.php';
$db = Database::instance(); 
$sql = "SELECT * FROM employees WHERE id = ?";
$param = $_GET["id"];
$result = $db->query($sql , [$param]);

$employee = $result->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2" cellpadding="15">
    <tr>
        <th>ID</th>
        <td><?php echo $employee['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $employee['name']; ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $employee['Address']; ?></td>
    </tr>
    <tr>
        <th>Salary</th>
        <td><?php echo $employee['salary']; ?></td>
    </tr>
</table>

</body>
</html>