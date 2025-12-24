<?php
require_once 'Database.php';
$db = Database::instance();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->query("SELECT * FROM employees WHERE id = ?", [$id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$employee) {
        die("Employee not found!");
    }
}
if (isset($_POST['submit']) && !empty( $_POST['name']) && !empty($_POST['address'])  && !empty( $_POST['salary']) ) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name = ?, Address = ?, salary = ? WHERE id = ?";
    $params = [$name, $address, $salary, $id];

    $db->query($sql, $params);

    // التوجيه للصفحة الرئيسية بعد التعديل
    header('Location: index.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
</head>
<body>

    <h2>Update Employee </h2>

    <form action="update.php?id=<?php echo $employee['id']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required ><br><br>

        <label>Address:</label><br>
        <input type="text" name="address" value="<?php echo htmlspecialchars($employee['Address']); ?>" required><br><br>

        <label>Salary:</label><br>
        <input type="number" name="salary" step="0.01" value="<?php echo htmlspecialchars($employee['salary']); ?>" required><br><br>

        <button type="submit" name="submit">Save Changes</button>
        <a href="index.php">Cancel</a>
    </form>

</body>
</html>