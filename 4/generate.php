<?php
function generate($text, $chance)
{
    $rand = rand(0,1000);
    for ($i = 1; $i != count($text)+1; $i++) {
        $chance[$i] = $chance[$i] + $chance[$i-1];
        if (($rand/1000 <= $chance[$i])&($rand/1000 > $chance[$i-1])) {
            yield $i;
        }
    }
}


function request($text, $chance, $num)
{
    $number = array();
    for ($i = 0; $i < $num; $i++) {
        foreach (generate($text, $chance) as $val) {
            $number[$val]++;
        }
    }
    return $number;
}