<?php


// task 1
echo "PHP Version: " . phpversion();
echo "<hr>";

// echo "PHP Version: " . phpinfo();
// echo "<hr>";

$sample1 = 'Tomorrow I \'ll learn PHP global variables.';
$sample2 = 'This is a bad command: del c:\.';

// task 2
$output2 = str_replace('\.', '*.*', $sample2);
echo $sample1 . "<br>" . $output2;
echo "<br> <hr>";


// task 3
$name = $_POST["username"];
if (isset($_POST["username"])) {
    echo ' welcome ' . htmlspecialchars($name);
    echo "<hr>";
} else
    echo "No Name <hr>";


// task 4
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    // IP من الإنترنت المشترك
    echo $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // IP من proxy
    echo $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    // IP مباشر
    echo $_SERVER['REMOTE_ADDR'];
}
echo "<hr>";

//task 5
echo basename($_SERVER['PHP_SELF']) . "<hr>";
// echo $_SERVER['PHP_SELF'] . "<hr>";


// task 6
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $url . "<hr>";

// task 7
$string = "PHP Tutorial.";

$words = explode(" ", $string);

foreach ($words as $word) {
    $firstChar = substr($word, 0, 1);
    $restWord  = substr($word, 1);

    echo "<span style='color:red;'>$firstChar</span>$restWord <hr> ";
}

//task 8
header("Location: https://www.w3schools.com/");
?>