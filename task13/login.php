<?php
session_start();
require_once 'Database.php';

$errors = [];

// 1. يجب وضع كل منطق PHP داخل شرط الـ POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = Database::instance();

    // 2. تأكد من أن اسم الجدول هو employees كما في صفحة التسجيل
    $sql = "SELECT * FROM users WHERE email = ?";
    $param = [$email];

    // تخزين النتيجة في متغير $user
    $user = $db->query($sql, $param)->fetch(PDO::FETCH_ASSOC);

    // 3. التحقق من وجود المستخدم أولاً ثم مطابقة الباسورد المشفر
    if ($user && password_verify($password, $user['password']) && $email != "admin.admin@gmail.com") {
        $sql = "UPDATE users SET last_login = ? WHERE email = ?";
        date_default_timezone_set('Asia/Amman');
        $current_date = date("Y-m-d H:i:s");
        $params = [$current_date, $email];
        $db->query($sql, $params);
        header("Location: welcome.php");

        exit;
    } else if ($user && password_verify($password, $user['password']) && $email == "admin.admin@gmail.com") {
        $sql = "UPDATE users SET last_login = ? WHERE email = ?";
      date_default_timezone_set('Asia/Amman');
        $current_date = date("Y-m-d H:i:s");
        $params = [$current_date, $email];
        $db->query($sql, $params);
        header("Location: admin.php");

    } else
        // رسالة موحدة للأمان (حتى لا يعرف المخترق هل الخطأ في الإيميل أم الباسورد)
        $errors[] = "Incorrect Email or Password!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2>Login</h2>

        <!-- Success message from signup -->
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'];
            unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <!-- Error messages -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error)
                    echo $error . "<br>"; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="mt-3">
            <!-- Email -->
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>