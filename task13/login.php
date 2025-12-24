<?php
session_start();

$errors = [];

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in registered users
    if (isset($_SESSION['users'][$email])) {
        // Check password
        if ($_SESSION['users'][$email]['password'] === $password) {
            $_SESSION['logged_in'] = $email; // store logged in user
            header("Location: welcome.php"); // redirect to welcome page
            exit;
        } else {
            $errors[] = "Incorrect password!";
        }
    } else {
        $errors[] = "Email not registered!";
    }
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
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <!-- Error messages -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) echo $error . "<br>"; ?>
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
