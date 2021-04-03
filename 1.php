<?php

$string = "PapaMakanJerukWaktuBuka";
function hitungKata($string) // memisahkan kata dan mengembalikan jumlah kata yang terdapat
{
    $newString = preg_replace("/([A-Z].[^A-Z(]+)/s", "$1 ", $string);
    $newString = rtrim($newString, " ");
    $array = explode(" ", $newString);


    return count($array);
}
function pisahKata($string) // mengembalikan array
{
    $newString = preg_replace("/([A-Z].[^A-Z(]+)/s", "$1 ", $string);
    $newString = rtrim($newString, " ");
    return $array = explode(" ", $newString);
}

echo hitungKata($string);
echo " - > terdiri dari ";
echo "(" . implode(",", pisahKata($string)) . ")";
