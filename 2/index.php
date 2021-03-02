<?php
include_once('Task.html');
$textarea = $_REQUEST['textarea'];
if (!empty($textarea)) {
    $num = 0;
    function generate($text)
    {
        $call = 0;
        for ($i = 0; $i < strlen($text); $i++) {
            switch ($text[$i]){
                case "h":
                    $text[$i] = 4;
                    $call++;
                    break;
                case "l":
                    $text[$i] = 1;
                    $call++;
                    break;
                case "e":
                    $text[$i] = 3;
                    $call++;
                    break;
                case "o":
                    $text[$i] = 0;
                    $call++;
                    break;
            }
            yield $text[$i];
        }
        echo "<br />".$call;
    }
    foreach (generate($textarea) as $val) {
        echo $val[$num];
    }
}
else{
    echo "Введите значение";
}