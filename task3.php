<?php
//task 1
$myName = "hamzeh marwan";
echo strtolower($myName) . "<br>";
echo strtoupper($myName) . "<br>";
echo ucfirst($myName). "<br>"; 
echo ucwords($myName). "<br>"; 



// task 2
$date ='085119';
$newDate =' ';
for ($i = 0; $i < 6; $i++) {
 if($i %2 == 0 && $i != 0)
    $newDate .=':';
    $newDate .= $date[$i];

}
echo $newDate. "<br>"; 



//task 3
$word = "I am a full stack developer at orange coding academy";
$sepcialWord = "‘Orange";
echo !strpos(strtolower($word), strtolower($sepcialWord) ) ? "Word Found!" : "Not Found!";



//task 4
$fileName = "C:\\xampp\\htdocs\\yourProject\\task3.php";
$reg = '/\w+\.php/i';  
// $fileNameByMethod = basename($filePath);
preg_match($reg, $fileName, $matches);
echo "<br> " .$matches[0];



// task 5 
$email = "info@orange.com";
$reg = '/\w+(\.\w+)?/i';
 preg_match($reg, $email,$username);
echo "<br> " .$username[0];



//task 6
echo "<br> " . substr($email,-3);



//task 7 
$str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    $password = '';
    $maxIndex = strlen($str) - 1;

    for ($i = 0; $i < 8; $i++) {
        // Use random_int for secure random number generation
        $index = random_int(0, $maxIndex);
        $password .= $str[$index];
    }
    echo '<br>'. $password;



    //task 8
    $statment = "That new trainee is so genius";
    $word = "our";
    $statment =explode(" ", $statment);
    $statment[0] =$word;
    $statment = implode(" ", $statment);
     echo '<br>'.$statment;



     // task 9
     $string1 ='dragonball';
     $string2 ='dragonboll';
     $min ="". $string2; 
     $max ="". $string1; 
     $index = -1;
     if(strlen($string1) < strlen($string2)) {
        $min ="" . $string1;
        $max = "". $string2;
     }
    for( $i = 0; $i < strlen($min); $i++ ) {
       if($min[$i] !== $max[$i])
        $index = $i;
    }

     echo $index > -1 ? '<br>' . "First difference between two strings at position $index: $max[$index] vs $min[$index] <br> " : 'no difference <br>' ;



     // task 10
          $statment ="Twinkle, twinkle, little star.";
          $statment= explode(" ", $statment);
     var_dump($statment);



     // task 11 
     $char = 'a';
     echo "<br>". chr ( codepoint: ord($char) + 1)   ."<br>";



     // task 12
     $statment = 'The brown fox';
     $insert =  'quick';
     $between1 =  'The';
     $between2 ='brown';
     $statmentNew = explode(' ', $statment);

     for( $i = 0; $i < count($statmentNew)-1; $i++ ){
        if($statmentNew[$i] === $between1 && $statmentNew[$i+1] === $between2){
           array_splice($statmentNew, $i+1, 0, $insert);
        $i++;
        }
     }
     $statment = implode(' ', $statmentNew);
     echo $statment . "<br>";
    echo $statmentNew[0] . "<br>";




     // task 13
     $statment = '0000657022.24';
     $statmentNew = str_split($statment);
     for( $i = 0; $i < count($statmentNew); $i++ ){
        if($statmentNew[$i] == '0'){
            $statmentNew[$i]="";
        }
     }
     $statment = implode("", $statmentNew);
     echo $statment . "<br>";
    //  $statment = str_replace('0', '', $statment);



    //task 14 
     $statment = 'The quick brown fox jumps over the lazy dog';
     $word ='fox';
     $statment = str_replace($word ,'', $statment);
     echo $statment . "<br>";


  // task 15 
     $statment = 'The quick brown fox jumps over the lazy dog---';
          $statment = str_replace('-' ,'', $statment);
     echo $statment . "<br>";

     //task 16
     $statment ='\"\1+2/3*2:2-3/4*3';
     $statment = preg_replace('/[0-9a-zA-Z]/', '', $statment);
     echo $statment . '<br>';



     //task 17
     $statment = 'The quick brown fox jumps over the lazy dog';
     $statmentNew = explode(' ', $statment);
     $statment="";
     for( $i = 0; $i < 5; $i++ ){
     $statment .= $statmentNew[$i] ." ";
     }
     echo $statment . "<br>";



     //task 18
     $statment = '2,543.12';
      $statment = str_replace(',' ,'', $statment);
     echo $statment . "<br>";


     // task 19
     for( $i = 97 ; $i < 123; $i++ )
        echo chr($i) . " ";

?>