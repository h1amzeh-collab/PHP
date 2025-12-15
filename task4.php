<?php
// task 1
for ($i = 1; $i <= 10; $i++) {
    echo $i;
    if ($i != 10)
        echo "-";
}
echo "<br>";


// task 2
$total = 0;
for ($i = 1; $i <= 30; $i++) {
    $total += $i;
    echo $total . " ";
}
echo "<br>";

// task 3
echo "<br>";
$calc = 5;
for ($i = 65; $i <= 69; $i++) {

    // if($i%5 == 0)
    for ($j = 1; $j <= 5; $j++) {
        if ($calc >= $j && $i < 69) {
            echo "A";
            continue;
        } else
            echo chr($i) . " ";

    }
    echo "<br>";
    $calc = ceil($calc / 2);
}
echo "<br>";


// task 4
echo "<br>";
$calc = 5;
for ($i = 1; $i <= 5; $i++) {

    // if($i%5 == 0)
    for ($j = 1; $j <= 5; $j++) {
        if ($calc >= $j && $i < 5) {
            echo "1 ";
            continue;
        } else
            echo "$i ";

    }
    echo "<br>";
    $calc = ceil($calc / 2);
}



// task 5
echo "<br>";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($i == $j)
            echo "$i ";
        else
            echo "0 ";
    }
    echo "<br>";
}


// task 6
$fac = 5;
for ($i = $fac - 1; $i >= 1; $i--) {
    $fac *= $i;
}
echo "$fac <br>";


// task 7
$num = 5;
$current = 1;
$previce = 0;
$sum = 0;

for ($i = 1; $i <= $num + 1; $i++) {
    $sum = $current + $previce;
    $previce = $current;
    $current = $sum;
    echo " , " . $sum;
}

// task 8
echo '<br>';
$statment = "Orange Coding Academy";
$count = 0;
for ($i = 0; $i < strlen($statment); $i++) {
    if (strtolower($statment[$i]) == "c") {
        $count++;
    }
}
echo $count . '<br>';


//task 9 
echo '<table border="1" cellpadding="6px" cellspacing="0px">';
for ($i = 1; $i <= 5; $i++) {
    echo "<tr> ";
    for ($j = 1; $j <= 6; $j++) {
        echo "<td> $i * $j = " . $i * $j . "</td>";
    }
    echo "</tr> ";
}
echo "</table>";

// task 10
echo "<br>";

for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0)
        echo " FizzBuzz, ";
    else if ($i % 3 == 0)
        echo " Fizz, ";
    else if ($i % 5 == 0)
        echo " Buzz, ";
    else
        echo " $i, ";
}




// task 11
echo "<br>";
for ($i = 1, $s = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $s++ . " ";
    }
    echo "<br>";
}
    echo "<br>";
    echo "<br>";
    echo "<br>";

//task 12 
$isTrue = false;
for ($i = 1; $i >= 0; ) {
    for ($j = $i; $j <= 5; $j++) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo chr($k + 64) . "&nbsp;&nbsp;";
    }
    if($i == 5)
        $isTrue = true;
    
    if($isTrue)
        $i--;
    else
        $i++;
        
    echo "<br>";

}

?>