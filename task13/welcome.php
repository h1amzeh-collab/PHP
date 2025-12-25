<?php
session_start();

// إذا لم يكن المستخدم مسجّل دخول، رجعه لصفحة اللوجن
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['logged_in'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 text-center">
    <div class="card p-4 shadow">
        <h1 class="mb-3">Welcome 🎉</h1>
        <p class="lead">You have successfully logged in.</p>

        <hr>

        <p><strong>User Email:</strong> <?= $email; ?></p>

        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>

</body>
</html>
