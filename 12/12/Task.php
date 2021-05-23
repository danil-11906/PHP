<?php
$textarea = '';
if (isset($_POST['textarea'])) {
    $textarea = $_POST['textarea'];
}
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
    function request($text)
    {
        $array = "";
        foreach (generate($text) as $val){
            $num = 0;
            $array .= $val[$num];
        }
        return $array;
    }
    function check ($array, $text)
    {
        $call = 0;
        for ($i = 0; $i < strlen($text); $i++) {
            if ($array[$i] != $text[$i]) {
                $call++;
            }
        }
        return $call;
    }
    $array = request($textarea);
    $index = check($array,$text);
    echo $array;
    echo "<br />".$index;