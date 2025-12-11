<?php

// task 1
$color = array("red","green","white");
echo " <h3> The memory of that scene for me is like a frame of 
film forever frozen at that moment: the $color[0] carpet, the $color[1] lawn, the $color[2] house,
the leaden sky. The new president and his first lady. - Richard M. Nixon </h3>";

 // task 2 
 echo " <h3>
 <ul>
 <li>$color[2]</li>
 <li>$color[1]</li>
 <li>$color[0]</li>
 </ul> <br> </h3>
 " ;

 // task 3
 $cities = array( 
    "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels",
  "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", 
  "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana",
   "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin",
    "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid" );

    asort($cities);

    foreach($cities as $city){
        echo "The capital of Netherlands is   $city <br>" ;
    }


    // task 4
    $color2 = array (4 => 'white', 6 => 'green', 11=> 'red');
    echo " <br> <h3> $color2[4] </h3>";

    // task 5 
    $number = array("1","2","3","4","5");
    array_splice($number , 4,0 ,"$"); // 0 اذ مابدي استبدل
    print_r(  $number  );

    // task 6 
    $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
    foreach($fruits as $key => $value){
        echo "<h3> $key = $value </h3>";
    }

// task 7
    $numbers = array(
    78, 60, 62, 68, 71, 68, 73, 85, 66, 64,
    76, 63, 75, 76, 73, 68, 62, 73, 72, 65,
    74, 62, 62, 65, 64, 68, 73, 75, 79, 73
);

$avg = 0;
sort($numbers);
foreach($numbers as $num ){
    $avg += $num;
}
echo "avarage = " . $avg / count($numbers) ;
echo "<br>List of seven highest temperatures : ";
for($i = count($numbers)-1 ; $i > count($numbers) - 7  ; $i-- ){
    echo $numbers[$i] . ", ";
}
echo "<br> List of seven  temperatures : ";
for($i = 0; $i < 7  ; $i++ ){
        echo $numbers[$i] . ", ";
}
//task 8
echo "<br> ";
$array1 = array("color" => "red", 2, 4);
 $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$array1 = array_merge($array1, $array2);
print_r($array1);

// task 9
echo "<br> ";
$colors = array("red","blue", "white","yellow");
for($i = 0; $i < count($colors); $i++ ){
    $colors[$i] = strtoupper($colors[$i]);
    echo $colors[$i] . "  ";
}

//task 10
echo "<br> ";
$colors = array("red","blue", "white","yellow");
for($i = 0; $i < count($colors); $i++ ){
    $colors[$i] = strtolower($colors[$i]);
    echo $colors[$i] . "  ";
}

//task 11
echo "<br> ";
for($i = 200; $i <= 250; $i++ ){
 if($i %4 == 0){
    echo $i . "  ";
 }}

 //task 12
echo "<br> ";
$words = array("abcd","abc","de","hjjj","g","wer");
$min = strlen( $words[0] );
$max = strlen( $words[0] );

for($i = 1; $i < count($words); $i++ ){
    if(strlen( $words[$i] ) > $max)
        $max = strlen( $words[$i] );
    if(strlen( $words[$i] ) < $min)
        $min = strlen( $words[$i] );
}
echo " The shortest array length is $min <br> ";
echo " The longest array length is $max <br> ";

// task 13
echo "<br> ";
for($i = 1; $i < 11; $i++ ){
echo rand(10, 20) . " ";
}

//task 14
echo "<br> ";
$array1 = array( 2, 0, 10, 12, 6);
$min = max($array1) ;
for($i = 0; $i < count($array1) ; $i++ ){
    if($array1[$i] < $min && $array1[$i] != 0)
        $min = $array1[$i];
}
echo $min;

?>