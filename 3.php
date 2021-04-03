<?php

$string = ['D', 'U', 'M', 'B', 'W', 'A', 'Y', 'S', 'I', 'D'];

function patern($string)
{
    $patern  = [];

    foreach ($string as $key => $value) {
        if ($key % 2 == 0) {
            $patern[] = "=";
        } else {
            $patern[] = "*";
        }
    }

    $p = implode(" ", $patern);
    $patern = implode(" ", $patern) . "<br>";
    $reverse = strrev($p);
    $double = str_repeat($patern, floor((count($string) / 2) / 2));
    $patern = $double;
    $patern .= $reverse .= "<br>";
    foreach ($string as $s) {
        $patern  .= ($s) . " ";
    }
    $patern .= "<br>" . $reverse;
    $patern .=  $double;
    return $patern;
}

echo patern($string);
