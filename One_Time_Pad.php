<?php

$en_text = "ANT";
$de_text = "FBG";
$secret = "00101 01100 10101";
$arr_secret = (explode(" ", $secret));
echo $en_text . "          ";
echo $secret . "          ";

function enencrypt($text, $arr_secret)
{
    for ($i = 0; $i < strlen($text); $i++) {
        $array_text[$i] = $text[$i];
        $text_int[$i] = ord("$array_text[$i]");
        $text_int[$i] = $text_int[$i] - 65;
        $text_bi[$i] = decbin($text_int[$i]);
        $int_text = (int)$text_bi[$i];
        $int_secret = (int)$arr_secret[$i];
        $xor[$i] = $int_text ^ $int_secret;
        $text_newint[$i] = bindec($xor[$i]) + 65;
        $text_new[$i] = chr($text_newint[$i]);
        echo  $text_new[$i] . " ";
    }
}
echo enencrypt($en_text, $arr_secret) . "          ";

function decrypt($text, $arr_secret)
{
    for ($j = 0; $j < strlen($text); $j++) {
        $array_text[$j] = $text[$j];
        $text_int[$j] = ord($array_text[$j]);
        $text_int[$j] = $text_int[$j] - 65;
        $text_bi[$j] = decbin($text_int[$j]);
        $int_text = (int)$text_bi[$j];
        $int_secret = (int)$arr_secret[$j];
        $xor[$j] = $int_text ^ $int_secret;
        $text_newint[$j] = bindec($xor[$j]) + 65;
        $text_new[$j] = chr($text_newint[$j]);
        echo $text_new[$j] . " ";
    }
}
echo decrypt($de_text, $arr_secret) . "          ";
