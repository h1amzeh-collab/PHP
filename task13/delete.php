<?php
require_once 'Database.php';
$db = Database::instance(); 
if (isset($_GET['id'])) {
$sql = "DELETE FROM users WHERE id = ?";
$param = $_GET['id'];
$db->query($sql, [$param]);
header('Location: admin.php');
exit;
}
?>

