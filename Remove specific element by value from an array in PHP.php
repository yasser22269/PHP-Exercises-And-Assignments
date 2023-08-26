<?php

function PrintArray($array){
    for ($i=0;$i<count($array);$i++){
        if($i == count($array) -1 ){
            echo $array[$i];
        }else
            echo $array[$i] . " - ";
    }
}

function removeElement($number,$array){
    echo " The array is ";
   PrintArray (  $array );
    echo " we Will remove ($number). <br>";
    if(array_search($number,$array)){
        unset($array[ array_search($number,$array) ]);
        $array2 = array_values($array);
        echo "After remove ($number). The array is ";
        PrintArray (  $array2 );
        // var_dump ( $array );
    }else{
        echo "you can't remove this number because this number is not found in this array";
    }
    echo "<hr>";
}
$array = [1,2,3,4,5,6];

removeElement(2,$array);
removeElement(5,$array);
removeElement(7,$array);


