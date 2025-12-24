<?php
session_start();

// Create users array in session to store registered users
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $faname = $_POST['faname'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $day = (int)$_POST['day'];
    $month = (int)$_POST['month'];
    $year = (int)$_POST['year'];

    // ---------------- Email validation ----------------
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // ---------------- Mobile validation ----------------
    if (!preg_match('/^\d{14}$/', $mobile)) {
        $errors[] = "Mobile must be exactly 14 digits";
    }

    // ---------------- Full name validation ----------------
    foreach ([$fname, $mname, $lname, $faname] as $name) {
        if (!preg_match('/^[a-zA-Z]+$/', $name)) {
            $errors[] = "All name fields must contain only letters";
            break;
        }
    }

    // ---------------- Password validation ----------------
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters and include uppercase, lowercase, number, special character, and no spaces";
    }

    // Password confirmation
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match";
    }

    // ---------------- Date of Birth / Age validation ----------------
    $dob = strtotime("$year-$month-$day"); // هون اكيد دخلت رقم ميلادي فرح يحولو لثواني
    $age = (int)((time() - $dob) / (365.25 * 24 * 60 * 60));
     // هون بنقص عدد الثواني تبعوني بعدد الثواني الفعلية بيطلع عدد الثواني الي عشتها  وبعدها بقسمها على عدد الثواني بالسنة بيطلع عمري 
    // ادق من انو احسب الفرق بين السنوات فقط
    if ($age < 16) {
        $errors[] = "You must be at least 16 years old to register";
    }

    // ---------------- If no errors, store user ----------------
    if (empty($errors)) {
        $_SESSION['users'][$email] = [
            'mobile' => $mobile,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'faname' => $faname,
            'password' => $password,
            'dob' => "$day-$month-$year"
        ];
        $_SESSION['success'] = "Registration successful! Please login.";
        // header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Sign Up</h2>

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

        <!-- Mobile -->
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" pattern="\d{14}" required>
        </div>

        <!-- Full Name -->
        <div class="mb-3">
            <label>Full Name</label>
            <div class="row">
                <div class="col"><input type="text" name="fname" placeholder="First Name" class="form-control" required></div>
                <div class="col"><input type="text" name="mname" placeholder="Middle Name" class="form-control" required></div>
                <div class="col"><input type="text" name="lname" placeholder="Last Name" class="form-control" required></div>
                <div class="col"><input type="text" name="faname" placeholder="Family Name" class="form-control" required></div>
            </div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control"
                   pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[\S]{8,}" required>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm" class="form-control" required>
        </div>

        <!-- Date of Birth -->
        <div class="mb-3">
            <label>Date of Birth</label>
            <div class="row">
                <div class="col"><input type="number" name="day" min="1" max="31" placeholder="DD" class="form-control" required></div>
                <div class="col"><input type="number" name="month" min="1" max="12" placeholder="MM" class="form-control" required></div>
                <div class="col"><input type="number" name="year" min="1900" max="<?php echo date('Y'); ?>" placeholder="YYYY" class="form-control" required></div>
            </div>
        </div>

        <button class="btn btn-success">Register</button>
    </form>
</div>
</body>
</html>
