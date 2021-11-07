<?php
$en_text = "THISISABOOKIMAPENIHAVEGAMEILOVEYOUASDASDZZ";
$de_text = "TVLDOADHO]JI_D_C`LBAHHGSPVOZNTEKNUSRSGAA`Z";
$secret  = "ASDRGSDGASD";

function encrypt_oneTime($text, $secret)
{
    clearstatcache();
    $ciphertext = "";
    if (strlen($text) - strlen($secret) > 0) {
        $num = strlen($text) - strlen($secret);
        $len_secret = strlen($secret);
        for ($k = 0; $k < $num; $k++) {
            $secret[$len_secret + $k] = $secret[$k];
        }
    }
    echo $text . "<br>";
    echo $secret . "<br>";
    echo "<br>";

    for ($i = 0; $i < strlen($text); $i++) {
        $text_int[$i] = ord($text[$i]) - 65;
        $secret_int[$i] = ord($secret[$i]) - 65;

        $text_bin[$i] = decbin($text_int[$i]);
        $secret_bin[$i] = decbin($secret_int[$i]);

        $text_spit = str_split($text_bin[$i]);
        $secret_spit = str_split($secret_bin[$i]);

        $x = count($text_spit);
        $y = count($secret_spit);

        if ($x > $y) {
            $z = $x - $y;
            for ($j = 0; $j < $z; $j++) {
                $sum[$j] = $text_spit[$j];
            }
            for ($j = 0; $z < $x; $j++, $z++) {
                if ($text_spit[$z] == 0 && $secret_spit[$j] == 0)
                    $sum[$z] = 0;
                else if ($text_spit[$z] == 1 && $secret_spit[$j] == 1)
                    $sum[$z] = 0;
                else if ($text_spit[$z] == 0 && $secret_spit[$j] == 1)
                    $sum[$z] = 1;
                else if ($text_spit[$z] == 1 && $secret_spit[$j] == 0)
                    $sum[$z] = 1;
            }
        } else if ($y > $x) {
            $z = $y - $x;

            for ($j = 0; $j < $z; $j++) {
                $sum[$j] = $secret_spit[$j];
            }
            for ($j = 0; $z < $y; $j++, $z++) {
                if ($text_spit[$j] == 0 && $secret_spit[$z] == 0)
                    $sum[$z] = 0;
                else if ($text_spit[$j] == 1 && $secret_spit[$z] == 1)
                    $sum[$z] = 0;
                else if ($text_spit[$j] == 0 && $secret_spit[$z] == 1)
                    $sum[$z] = 1;
                else if ($text_spit[$j] == 1 && $secret_spit[$z] == 0)
                    $sum[$z] = 1;
            }
        } else {
            for ($j = 0; $j < $x; $j++) {
                if ($text_spit[$j] == 0 && $secret_spit[$j] == 0)
                    $sum[$j] = 0;
                else if ($text_spit[$j] == 1 && $secret_spit[$j] == 1)
                    $sum[$j] = 0;
                else if ($text_spit[$j] == 0 && $secret_spit[$j] == 1)
                    $sum[$j] = 1;
                else if ($text_spit[$j] == 1 && $secret_spit[$j] == 0)
                    $sum[$j] = 1;

            }
        }


        $text_secret[$i] = implode("", $sum);

        $text_secret[$i] = bindec($text_secret[$i]);

        $text_secret[$i] = ($text_secret[$i]) + 65;

        $new_text[$i] = chr($text_secret[$i]);
        echo $new_text[$i];
        $ciphertext .= $new_text[$i] . "";
        unset($sum);
        unset($text_spit);
        unset($secret_spit);
    }
    echo "<br><br>";
    return $ciphertext;
}
encrypt_oneTime($en_text, $secret);
echo "<br> <br>";
encrypt_oneTime($de_text, $secret);