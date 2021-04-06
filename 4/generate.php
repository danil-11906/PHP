<?php
function generate($text, $chance, $num) {
    $number = array();
    $start = $chance;
    for ($f = 0; $f < $num; $f++) {
        $rand = rand(0, 1000);
        for ($i = 1; $i != count($text) + 1; $i++) {
            $chance[$i] = $chance[$i] + $chance[$i - 1];
            if (($rand / 1000 <= $chance[$i]) & ($rand / 1000 > $chance[$i - 1])) {
                $number[$i]++;
            }
        }
        $chance = $start;
    }
    yield $number;
}


function request($text, $chance, $num){
    $number = array();
    foreach (generate($text, $chance, $num) as $val) {
        $number = $val;
    }
    return $number;
}