<?php
include_once('Task.html');
$textarea = $_REQUEST['textarea'];
if (!empty($textarea)) {
    $num = 0;
    $array = "";
    $call = 0;
    $text = $textarea;
    function generate($text)
    {
        for ($i = 0; $i < strlen($text); $i++) {
            switch ($text[$i]){
                case "h":
                    $text[$i] = 4;
                    break;
                case "l":
                    $text[$i] = 1;
                    break;
                case "e":
                    $text[$i] = 3;
                    break;
                case "o":
                    $text[$i] = 0;
                    break;
            }
            yield $text[$i];
        }
    }
    foreach (generate($textarea) as $val) {
        $array .= $val[$num];
    }
    for ($i = 0; $i < strlen($textarea); $i++) {
        if ($array[$i] != $text[$i]) {
            $call++;
        }
    }
    echo $array;
    echo "<br />".$call;
}
else{
    echo "Введите значение";
}