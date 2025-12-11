<?php

$year = 2013; 

if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "$year is a leap";
} else 
    echo "$year is not a leap";


    // task 2
    $temperature = 25; 

if ($temperature < 20) 
    echo "It is Winter";
 else 
    echo "It is summertim";


 // task 3
 echo "<br>";
$fir = 2;
$sec = 2;
$sum = $fir + $sec;
if ($fir == $sec) {
    echo "($fir + $sec) * 3 = " . $sum * 3;
} 
else 
    echo $sum;

//task 4
echo "<br>";
$num1 = 10;
$num2 = 1; 

$sum = $num1 + $num2;

if ($sum == 30) 
    echo $sum;
 else 
    echo 'false';

// task 5
echo '<br>';
$num = 20; 

if ($num > 0 && $num % 3 == 0) 
    echo 'true';
 else 
    echo 'false';

// task 6
echo '<br>';
$num = 50; 
if ($num >= 20 && $num <= 50) 
    echo 'true';
 else 
    echo 'false';

// tasl 7
$num = 1;
$num2 = 5;
$num3 = 9;
$max = $num; 
if ($num2 > $max) 
    $max = $num2;
if ($num3 > $max) 
    $max = $num3;
echo $max;

// tasl 8
echo '<br>';
$units = 275;
$bill = 0;

if ($units <= 50) 
    $bill = $units * 2.5;
elseif ($units <= 150) 
    $bill = (50 * 2.5) + (($units - 50) * 5);
 elseif ($units <= 250)  
    $bill = (50 * 2.5) + (100 * 5) + (($units - 150) * 6.2);
else 
    $bill = (50 * 2.5) + (100 * 5) + (100 * 6.2) + (($units - 250) * 7.5);


echo "Electricity Bill: " . $bill . " JOD";

// task 9
echo '<br>';
$num1 = 10;
$num2 = 5;  
echo $num1 + $num2 ."<br>";
echo  $num1 - $num2 . "<br>";
echo $num1 * $num2 ."<br>";
if ($num2 != 0) 
    echo $num1 / $num2 . "<br>";
else 
    echo "no div";


// task 10
echo "<br>";
$age = 15; 
if ($age >= 18) 
    echo "is eligible to vote";
 else 
    echo "is not eligible to vote";

 // task 11
 echo "<br>";
 $num = -60;
if ($num > 0) 
    echo "Positive";
 elseif ($num < 0) 
    echo "Negative";
 else 
    echo "Zero";

 // task 12
 $scores = [60, 86, 95, 63, 55, 74, 79, 62, 50];

$avrg = array_sum($scores) / count($scores);

$gradeKey = (int)($avrg / 10);

switch($gradeKey) {
    case 10:
    case 9:
        $grade = 'A';
        break;
    case 8:
        $grade = 'B';
        break;
    case 7:
        $grade = 'C';
        break;
    case 6:
        $grade = 'D';
        break;
    default:
        $grade = 'F';
        break;
}

echo "Average: $avrg<br>";
echo "Grade: $grade";
?>
