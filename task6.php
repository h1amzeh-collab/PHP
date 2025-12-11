<?php
//task 1
function isPrime($number) {
    for( $i = 2; $i < $number; $i++ ) {
        if( $number % $i == 0)
            return "Not Prime <br>";
    }
    return "Prime <br>" ;
 }


// task 2
 function reverse ($statment) {
        $newStatment ="";
      for( $i = strlen($statment) -1 ; $i >= 0 ; $i-- ){
         $newStatment .=$statment[$i] ."";
      }
      return $newStatment;
 }

 //task 3
 function isLowerCase($statment) {
    for( $i = 0; $i < strlen($statment); $i++ ){
     if( ord($statment[$i] ) <= 96)
        return "Your String is Not Ok";
    }
    return "Your String is Ok";
 }


 //task 4
 function swap ($x ,$y){
      $x +=$y;
      $y = $x - $y;
      $x =$x - $y ;
      echo " <br> $x , $y <br>";
 }
 //task 5
 function swapRepeat ($x ,$y){
      $x +=$y;
      $y = $x - $y;
      $x =$x - $y ;
      return " <br> $x , $y <br>";
 }


  
 //task 6
 function armstrong ($num){
    $sum =0;
    $n =$num;
    for($i = 0; $i < strlen($n) ;$i++ ){
        $sum += pow ($num % 10 ,3);
        $num =floor( $num / 10 );  

    }
    return $sum == $n ? "$n is Armstrong Number <br>" : "$n is Not Armstrong Number <br>";

 }

// task 7
function palindrome ($statment){
    $reg = '/[a-zA-Z]/i';
    preg_match_all($reg,$statment, $arr);
     $res = implode('', $arr[0]);

    return  strtolower( $res )
     === 
     strtolower( reverse( $res ) ) 
     ? "Yes it is a palindrome <br>" :"No it is a palindrome <br>";  
} 

//task 8
function uneqie ($num){
    $arr =[];
    echo "(";
  for( $i = 0,$index=0; $i < count($num); $i++ ){
    for( $j = 0; $j < count($num); $j++ ){
        if( !in_array($num[$j], $arr) ){
             $arr[$index] =$num[$j]; 
            echo $arr[$index];
             $index++;
            if( $j != count($num) - 2 )
                echo " , ";       
    }
  }
}
  echo ")";
}

//task 1
 echo isPrime(3);

 //task 2
 echo reverse("remove") ."<br>";

 //task 3
 echo isLowerCase("remove");

 //task 4
 echo swap(7,12);

 //task 5
 echo swapRepeat(7,12);
 
 //task 6
echo armstrong(407);

// task 7
echo palindrome("Eva, can I see bees in a cave?") ;

// task 8
uneqie(array(2, 4, 7, 4, 8, 4) );


?>