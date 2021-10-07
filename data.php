<?php

$en_text = "ATTACKATDAWN";
$de_text = "FBGBF";
$secret = "LEMONLEMONLE";

function encrypt($text, $secret)
{
    for ($i = 0; $i < strlen($text); $i++) {
        $array_text[$i] = $text[$i];
        $array_secret[$i] = $secret[$i];
        $text_int[$i] = ord("$array_text[$i]");
        $secret_int[$i] = ord("$array_secret[$i]");
        //echo $text_int[$i]."/".$secret_int[$i];
        $text_int[$i] = $text_int[$i] - 65;
        $secret_int[$i] = $secret_int[$i] - 65;
        //echo $text_int[$i]."/".$secret_int[$i];
        $text_bi[$i] = decbin($text_int[$i]);
        $secret_bi[$i] = decbin($secret_int[$i]);
        $int_text = (int)$text_bi[$i];
        $int_secret = (int)$secret_bi[$i];
        $xor[$i] = $int_text ^ $int_secret;
        $text_newint[$i] = bindec($xor[$i]) + 65;
        $text_new[$i] = chr($text_newint[$i]);
        echo  $text_new[$i];
        //echo "<br>";
    }
}
//echo enencrypt($en_text, $arr_secret) . "          ";

function decrypt($text, $secret)
{
    for ($j = 0; $j < strlen($text); $j++) {
        $array_text[$j] = $text[$j];
        $array_secret[$j] = $secret[$j];
        $text_int[$j] = ord($array_text[$j]);
        $secret_int[$j] = ord($array_secret[$j]);
        $text_int[$j] = $text_int[$j] - 65;
        $secret_int[$j] = $secret_int[$j] - 65;
        $text_bi[$j] = decbin($text_int[$j]);
        $secret_bi[$j] = decbin($secret_int[$j]);
        $int_text = (int)$text_bi[$j];
        $int_secret = (int)$secret_bi[$j];
        $xor[$j] = $int_text ^ $int_secret;
        $text_newint[$j] = bindec($xor[$j]) + 65;
        $text_new[$j] = chr($text_newint[$j]);
        echo $text_new[$j];
    }
}
encrypt($en_text, $secret);
echo"<br>";
decrypt($de_text, $secret)." ";
