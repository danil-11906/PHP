<?php
ini_set('max_execution_time', 900);
include_once('Task.html');
if (isset($_POST['textarea'])){
    if (isset($_POST['textarea'])){
        $textarea = $_POST['textarea'];
        $checkbox = $_POST['check'];
    }
    else {
        echo "please select the correct number of checkboxes";
    }
}
else {
    echo "Please write site";
}
if (!empty($textarea)) {
    if (!empty($checkbox)){
        if (count($checkbox)==1) {
            $escape_word = escapeshellcmd($textarea);
            echo "<strong>".$escape_word."</strong>"."<br>";

            if ($checkbox[0]=="ping") {
                $out = array();
                exec("ping $escape_word", $out);
                if (count($out)>3) {
                    $output = $out[9];
                    $num = preg_match_all("/[0-9]/", $output);
                    $output = 100 - (int)substr($output, 5, $num) . "% успешных запросов";
                    echo $output . "<br>";
                }
                else{
                    echo "please write normal site";
                }
            }
            else{
                $out = array();
                $counter = 0;
                exec("tracert $escape_word", $out);
                if(count($out)>3) {
                    $int = array();
                    for ($i = 0; $i < count($out); $i++) {
                        if (preg_match("/([0-9]{1,3}[\.]){3}[0-9]{1,3}/", $out[$i])) {
                            preg_match("/([0-9]{1,3}[\.]){3}[0-9]{1,3}/", $out[$i], $in);
                            $int[$i] = $in[0];
                            if (strlen($int[$i]) > 3) {
                                $counter++;
                                if (($counter == 1) | ($i == count($out) - 3)) {
                                    echo "<strong>" . $int[$i] . "</strong>" . " ";
                                } else {
                                    echo $int[$i] . " ";
                                }
                            }
                        }
                    }
                }
                else {
                    echo "please write normal site";
                }
            }
        }
        else {
            echo "please select the correct number of checkboxes";
        }
    }
}