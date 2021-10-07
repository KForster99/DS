<?php
$en_text = "HELLODFGHsd5115";
$de_text = "!qnvzmw|l[ULvAu";
$secret  = "XMCKLJRVEgp8f1a";

//$en_text = "ANT";
//$de_text = "FBG";
//$secret = "FMV";

function encrypt($text, $secret)
{
    for ($i = 0; $i < strlen($text); $i++) {
        $array_text[$i] = $text[$i];
        $array_secret[$i] = $secret[$i];
        $text_int[$i] = ord($array_text[$i]) - 33;
        $secret_int[$i] = ord($array_secret[$i]) - 33;
        $text_secret[$i] = $text_int[$i] + $secret_int[$i];
        $text_secret[$i] = ($text_secret[$i] % 94) + 33;
        $new_text[$i] = chr($text_secret[$i]);
        echo $new_text[$i] . "";
    }
}
//echo enencrypt($en_text, $arr_secret) . "          ";

function decrypt($text, $secret)
{
    for ($j = 0; $j < strlen($text); $j++) {
        $array_text[$j] = $text[$j];
        $array_secret[$j] = $secret[$j];
        $text_int[$j] = ord($array_text[$j]) - 33;
        $secret_int[$j] = ord($array_secret[$j]) - 33;
        if ($text_int[$j] - $secret_int[$j] < 0) {
            $text_int[$j] = $text_int[$j] + 94;
        }
        $text_secret[$j] = $text_int[$j] - $secret_int[$j];
        $text_secret[$j] = ($text_secret[$j] % 94) + 33;
        $new_text[$j] = chr($text_secret[$j]);
        echo $new_text[$j] . "";
    }
}
//echo "en_text=ATTACKATDAWN || secret=LEMONLEMONLE" . "<br>";
encrypt($en_text, $secret);
echo "<br> <br>";
//echo "de_text=LXAOCBEAHNAC || secret=LEMONLEMONLE" . "<br>";
decrypt($de_text, $secret);
