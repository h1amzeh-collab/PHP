<?php
// $name = "hamzeh";
// $age = 22;
// $arr = ["apple", "banana","shaorma"];

//  echo $arr[0] , "  ";

// print_r( $arr);

// define("one","two");
// const primary = 
// echo one;

// $number = 19;
// if ($number > 18 && $number < 60)
//     print_r("your number grater > 18 and number < 60 ");

// $whoName = "addmin";
// if($whoName === "editor" || $whoName === "addmin")
//     print_r("hello");

// $favorites = 
// array(
//     array("name" => "hamzeh" ,"age" => "22" , "country" => "jordan"),
//     array("name" => "abddalha" ,"age" => "26" , "country" => "jordan"),
//     array("name" => "sameer" ,"age" => "24" , "country" => "jordan")
// );

// print_r($favorites[0]["name"]);

// $name ="hamzeh marwan mohammad";
// echo $name;
// echo strlen($name)  ,"<br>";
// echo strpos($name,"mohammad") ,"<br>";
// echo substr($name,0,6) ,"<br>";
// echo strtoupper(substr($name,0,6)) ,"<br>"; 

  
$salaries = 
array(
    array("name" => "Salary hamzeh" ,"salary" => "1000"),
    array("name" => "Salary abddalhz" ,"salary" => "1200"),
    array("name" => "Salary abddalhz" ,"salary" => "1400")
);
echo "<table border=2>";
foreach($salaries as $salary){
    echo 
    "<tr> 
    <td>". $salary['name'] . "</td>" .
     "<td>". $salary['salary'] . "</td>" .
     "</tr>";
}
echo "</table> <bt> <br>";

$fileName = "C:\\xampp\\htdocs\\yourProject\\test.php";
$lastTime = filemtime($fileName);
echo date("Y-m-d", $lastTime) , "<br> <br>";

if(file_exists($fileName)){
    $lines = file($fileName);
    $countLines = count($lines);
    echo $countLines ,"<br>";
}



$num = 0;
if($num == 0){
    echo "zero";
}
else if ($num > 0) 
    echo "Positive";
else
    echo "negative";
    echo "<br>";

$test = "apple";
switch($test){
    case "apple": echo "apple"; break;
    case "banana": echo "banana"; break;
    case "mango": echo "mango"; break;
}

for($i =  1; $i <= 20 ; $i++){
    if($i %2== 0){
        echo "<br> $i";
    }
}

$movies = array(
    "Inception",
    "Interstellar",
    "The Dark Knight",
    "Shutter Island",
    "The Matrix"
);

foreach($movies as $movie){
    echo " <br> $movie ";
}
for($i =  1; $i <= 10 ; $i++){
 if($i == 5){
    continue;
 }
 else if($i == 8){
    break;
}
echo "<br> $i";
}
?>