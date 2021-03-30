<?php
$array = parse_ini_file("index.ini", $useSections=true, $mode=INI_SCANNER_NORMAL);
$str = htmlentities(file_get_contents($array["main"]["filename"]));
$str = explode("\n", $str);
for ($i = 0; $i < count($str); $i++){
    switch (substr($str[$i], 0 , strlen($array["first_rule"]["symbol"]))) {
        case $array["first_rule"]["symbol"]:
            if (strcmp($array["first_rule"]["upper"],"true")==0) {
                $str[$i] = strtoupper($str[$i]);
                break;
            }
            if (strcmp($array["first_rule"]["upper"],"false")==0) {
                $str[$i] = strtolower($str[$i]);
                break;
            }
        case $array["second_rule"]["symbol"]:
            if (strcmp($array["first_rule"]["direction"],"+")==0) {
                for ($f = 0; $f < strlen($str[$i]); $f++) {
                    if (preg_match("/[0-9]/", $str[$i][$f])) {
                        if($str[$i][$f]=="9"){$int = 0;}
                        else{$int = (int)$str[$i][$f] + 1;}
                        $str[$i][$f] = (string)$int;
                    }
                }
            }
            else {
                for ($f = 0; $f < strlen($str[$i]); $f++) {
                    if (preg_match("/[0-9]/", $str[$i][$f])) {
                        if($str[$i][$f]=="0"){$int = 9;}
                        else{$int = (int)$str[$i][$f] - 1;}
                        $str[$i][$f] = (string)$int;
                    }
                }
            }
            break;
        case $array["third_rule"]["symbol"]:
            $word = $array["third_rule"]["delete"];
            $str[$i] = str_replace($word,'',$str[$i]);
            break;
    }
}
for ($i = 0; $i < count($str); $i++) {
    echo $str[$i]."<br>";
}

