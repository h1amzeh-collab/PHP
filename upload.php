<?php
// بدء الجلسة إذا لاحقًا تريد ربط المستخدم
session_start();

if(isset($_FILES['image'])){
    $errors = [];

    $file_name = $_FILES['image']['name'];   
    $file_size = $_FILES['image']['size'];
    $file_tmp  = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    // إنشاء مجلد uploads إذا لم يكن موجود
    if(!file_exists('uploads')){
        mkdir('uploads', 0755, true);
    }

    // التحقق من امتداد الملف
    $allowed_ext = ['jpg','jpeg','png','gif'];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if(!in_array($ext, $allowed_ext)){
        $errors[] = "امتداد الملف غير مسموح!";
    }

    // التحقق من نوع MIME
    $allowed_types = ['image/jpeg','image/png','image/gif'];
    if(!in_array($file_type, $allowed_types)){
        $errors[] = "نوع الملف غير مسموح!";
    }

    // التحقق من الحجم (أقل من 2MB)
    if($file_size > 2*1024*1024){
        $errors[] = "حجم الملف أكبر من 2MB";
    }

    if(empty($errors)){
        // إعادة تسمية الملف لحماية الأمان
        $new_name = uniqid() . "." . $ext;
        move_uploaded_file($file_tmp, "uploads/".$new_name);
        echo "تم رفع الملف بنجاح: " . htmlspecialchars($new_name);
    } else {
        foreach($errors as $err){
            echo $err . "<br>";
        }
    }
} else {
    echo "لم يتم رفع أي ملف.";
}
?>
