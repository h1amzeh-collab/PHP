<?php
session_start();
require_once 'Database.php';

// حماية الصفحة: تأكد أن الأدمن فقط من يمكنه التعديل
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

$db = Database::instance();
$id = $_GET['id'] ?? null;

// 1. جلب بيانات المستخدم الحالية لعرضها في الفورم
if ($id) {
    $stmt = $db->query("SELECT * FROM users WHERE id = ?", [$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found!");
    }
} else {
    die("No ID provided!");
}

// 2. معالجة الطلب عند ضغط زر Save Changes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];

    // نحدث البيانات ونحدث أيضاً تاريخ التعديل (إذا أضفت عمود updated_at)
    $sql = "UPDATE users SET fname = ?, lname = ?, email = ?, mobile = ? WHERE id = ?";
    $params = [$fname, $lname, $email, $mobile, $id];

    $db->query($sql, $params);

    // التوجيه لصفحة الأدمن بعد النجاح
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
        <h2>Update User Details</h2>
        <hr>
        
        <form action="update.php?id=<?= $user['id'] ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" value="<?= htmlspecialchars($user['fname']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?= htmlspecialchars($user['lname']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control" value="<?= htmlspecialchars($user['mobile']) ?>" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="admin.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>