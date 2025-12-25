<?php
// Create users array in session to store registered users
session_start();
require_once 'Database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $faname = $_POST['faname'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $day = (int) $_POST['day'];
    $month = (int) $_POST['month'];
    $year = (int) $_POST['year'];

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
    // التحقق من أن التاريخ المدخل صحيح منطقياً (مثلاً لا يوجد 31 في شهر 2)
    if (!checkdate($month, $day, $year)) {
        $errors[] = "Invalid date of birth provided";
    } else {
        $dob_string = "$year-$month-$day"; // تجهيز التاريخ لقاعدة البيانات
        $dob = strtotime($dob_string); // هون اكيد دخلت رقم ميلادي فرح يحولو لثواني
        $age = (int) ((time() - $dob) / (365.25 * 24 * 60 * 60));
        // هون بنقص عدد الثواني تبعوني بعدد الثواني الفعلية بيطلع عدد الثواني الي عشتها  وبعدها بقسمها على عدد الثواني بالسنة بيطلع عمري 
        // ادق من انو احسب الفرق بين السنوات فقط
        if ($age < 16) {
            $errors[] = "You must be at least 16 years old to register";
        }
    }

    // ---------------- If no errors, store user ----------------
    if (empty($errors)) {
        $db = Database::instance();
        // تشفير كلمة المرور للحماية
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users(email, mobile, fname, mname, lname, faname, password, dob) VALUES(?,?,?,?,?,?,?,?)";
        
        $param = [
            $email, 
            $mobile, 
            $fname, 
            $mname, 
            $lname, 
            $faname, 
            $hashed_password, 
            $dob_string
        ];

        $result = $db->query($sql, $param);
        header("Location: login.php");
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
    <div class="container mt-5 mb-5">
        <div class="card shadow p-4">
            <h2>Sign Up</h2>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) echo $error . "<br>"; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="mt-3">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile (14 digits)</label>
                    <input type="text" name="mobile" class="form-control" pattern="\d{14}" placeholder="e.g. 9627XXXXXXXXXX" value="<?php echo isset($mobile) ? $mobile : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <div class="row g-2">
                        <div class="col-md-3"><input type="text" name="fname" placeholder="First Name" class="form-control" required></div>
                        <div class="col-md-3"><input type="text" name="mname" placeholder="Middle Name" class="form-control" required></div>
                        <div class="col-md-3"><input type="text" name="lname" placeholder="Last Name" class="form-control" required></div>
                        <div class="col-md-3"><input type="text" name="faname" placeholder="Family Name" class="form-control" required></div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <small class="text-muted">Must be 8+ chars with (A-z, 0-9, @$!%*?&)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <div class="row g-2">
                        <div class="col"><input type="number" name="day" min="1" max="31" placeholder="DD" class="form-control" required></div>
                        <div class="col"><input type="number" name="month" min="1" max="12" placeholder="MM" class="form-control" required></div>
                        <div class="col"><input type="number" name="year" min="1900" max="<?php echo date('Y'); ?>" placeholder="YYYY" class="form-control" required></div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-success w-100">Register</button>
            </form>
        </div>
    </div>
</body>
</html>