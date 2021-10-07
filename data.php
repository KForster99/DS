<?php
error_reporting(E_ERROR | E_PARSE);
$en_text = "ATTACKATDAWN";
$de_text = "FBGBF";
$secret  = "LEMONLEMONLE";

function encrypt($text, $secret)
{
    echo $text . "<br>";
    echo $secret . "<br>";
    for ($i = 0; $i < strlen($text); $i++) {
        $text_int[$i] = ord("$text[$i]");
        $secret_int[$i] = ord("$secret[$i]");
        echo "ord: " . $text_int[$i] . " / " . $secret_int[$i] . "<br>";

        $text_int[$i] = $text_int[$i] - 65;
        $secret_int[$i] = $secret_int[$i] - 65;
        echo "-65: " . $text_int[$i] . " / " . $secret_int[$i] . "<br>";

        $text_bi[$i] = decbin($text_int[$i]);
        $secret_bi[$i] = decbin($secret_int[$i]);
        echo "decbin: " . $text_bi[$i] . " / " . $secret_bi[$i] . "<br>";

        // $int_text = (int)$text_bi[$i];
        // $int_secret = (int)$secret_bi[$i];
        // echo "(int)decbin: " . $int_text . " / " . $int_secret . "<br>";

        $xor[$i] = intval($text_bi[$i]) ^ intval($secret_bi[$i]);
        // echo $int_text ^ $int_secret . "<br>";
        echo "xor: " . $xor[$i]  . "<br>";

        $text_newint[$i] = bindec($xor[$i]) + 65;
        echo "bindec: " . $text_newint[$i] . "<br>";

        $text_new[$i] = chr($text_newint[$i]);
        echo  $text_new[$i] . "<br><br>";
    }
}

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
echo "<br>";
decrypt($de_text, $secret);
