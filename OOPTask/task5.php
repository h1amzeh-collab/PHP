<?php
class MyClass
{
    function __construct()
    {
        echo "MyClass class has initialized!";
    }
    function massege($scott)
    {
        echo $scott . "<b>";
    }
    function factorial($num)
    {
        if ($num === 1)
            return 1;
        return $num * factorial($num - 1);
    }
    // function sort($array){
    //     $arraySort =[];
    //     for($i = 0; $i < count($array); $i++){
    //          $count = 0;  

    //         for($j = 0; $j < count($array); $j++){


    //             if( $array[$i] >= $array[$j] )
    //                 $count++;
    //         }
    //             //  echo $array[$i] . " -> $count <br> ";

    //            $index = array_search($array[$i] , $arraySort) ;

    //            if( $index != false )
    //              $arraySort[ $count ] = $i; 
    //            else 
    //             $arraySort[ --$count ] = $array[$i];
    //              echo $array[$i] . " -> $count <br> ";

    //         }
    //     echo "<br>";
    //     // for($i = 0; $i < count($arraySort); $i++){
    //     //     echo $arraySort[$i] .",";
    //     // }
    // }
    function difrentDate($date1, $date2)
    {
        $d1 = new DateTime($date1);
        $d2 = new DateTime($date2);
        $interval = $d1->diff($d2);
        echo "<br>" . $interval->days;
    }
    function convertDate($date){
       $date = new DateTime($date);
        $date = $date->format('Y-m-d');
        echo "<br>" . $date;
    }
}
$math = new MyClass();
$math->convertDate("1981-11-03");
// $math->sort([9,-5,2,-9,-8,-5,5,8,9,9,9]);
?>