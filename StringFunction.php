<?php

$str = "dlrow olleh";
echo "To reverse This string '$str' will be  '" . strrev($str) . "' <br>";
echo "Length the string is " . strlen($str) . "<br>";
echo "count the words in the string is " . str_word_count($str) . "<hr>";

// -------------------------------------------------------------

$title = "my name is yasser";
echo "to convert all the characters inside '$title' into uppercase will be '" . strtoupper($title) . "'<hr>";
// -------------------------------------------------------------

echo "<b>check if an array is a subset of another in PHP? </b> <br>";

$array1 = array('a','1','2','3','4');
$array2 = array('a','3');

if(array_intersect($array2,$array1)  === $array2){
    echo "It is a subset";
    //var_dump(array_intersect($array1,$array2) );
} else {
    echo "Not a subset";
}

// -------------------------------------------------------------
