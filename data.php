<?php
$en_text = "HELLODFGHsd5115";
$de_text = "!qnvzmw|l[ULvAu";
$secret  = "XMCKLJRVEgp8f1a";

//$en_text = "ANT";
//$de_text = "FBG";
//$secret = "FMV";

function encrypt_oneTime($text, $secret)
{
    $ciphertext = "";
    if (strlen($text) - strlen($secret) > 0) {
        $num = strlen($text) - strlen($secret);
        $len_secret = strlen($secret);
        for ($k = 1; $k <= $num; $k++) {
            $secret[$len_secret + $k] = $secret[$k - 1];
        }
    }
    for ($i = 0; $i < strlen($text); $i++) {
        $array_text[$i] = $text[$i];
        $array_secret[$i] = $secret[$i];
        $text_int[$i] = ord($array_text[$i]) - 32;
        $secret_int[$i] = ord($array_secret[$i]) - 32;
        $text_secret[$i] = $text_int[$i] + $secret_int[$i];
        $text_secret[$i] = ($text_secret[$i] % 95) + 32;
        $new_text[$i] = chr($text_secret[$i]);
        // echo $new_text[$i] . "";
        $ciphertext .= $new_text[$i] . "";
    }
    return $ciphertext;
}

function decrypt_oneTime($text, $secret)
{
    $plaintext = "";
    if (strlen($text) - strlen($secret) > 0) {
        $num = strlen($text) - strlen($secret);
        $len_secret = strlen($secret);
        for ($k = 1; $k <= $num; $k++) {
            $secret[$len_secret + $k] = $secret[$k - 1];
        }
    }
    for ($j = 0; $j < strlen($text); $j++) {
        $array_text[$j] = $text[$j];
        $array_secret[$j] = $secret[$j];
        $text_int[$j] = ord($array_text[$j]) - 32;
        $secret_int[$j] = ord($array_secret[$j]) - 32;
        if ($text_int[$j] - $secret_int[$j] < 0) {
            $text_int[$j] = $text_int[$j] + 95;
        }
        $text_secret[$j] = $text_int[$j] - $secret_int[$j];
        $text_secret[$j] = ($text_secret[$j] % 95) + 32;
        $new_text[$j] = chr($text_secret[$j]);
        // echo $new_text[$j] . "";
        $plaintext .= $new_text[$j] . "";
    }
    return $plaintext;
}

//echo "en_text=ATTACKATDAWN || secret=LEMONLEMONLE" . "<br>";
encrypt_oneTime($en_text, $secret);
echo "<br> <br>";
//echo "de_text=LXAOCBEAHNAC || secret=LEMONLEMONLE" . "<br>";
decrypt_oneTime($de_text, $secret);
