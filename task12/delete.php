<?php
require_once 'Database.php';
$db = Database::instance(); 
if (isset($_GET['id'])) {
$sql = "DELETE FROM employees WHERE id = ?";
$param = $_GET['id'];
$db->query($sql, [$param]);
header('Location: index.php');
exit;
}
?>

