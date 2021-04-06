<?php
include_once('Task.html');
$textarea = $_REQUEST['textarea'];
$num = $_REQUEST['number'];
if ((!empty($textarea))&(!empty($num))) {
    $counter = array();
    function setArray($text)
    {
        $arrayTwo = array();
        $arrayOne = explode("\n", $text);
        for ($i = 0; $i < count($arrayOne); $i++) {
            $arrayTwo[$i] = explode(" ", $arrayOne[$i]);
        }
        return $arrayTwo;
    }

    function upgrade($text) {
        for ($i = 0; $i < count($text); $i++) {
            $text[$i][count($text[$i])-1] = (int)$text[$i][count($text[$i])-1];
        }
        return $text;
    }

    function deleteElement($text) {
        $inResult = $text;
        for ($i = 0; $i < count($inResult); $i++) {
            array_pop($inResult[$i]);
        }
        return $inResult;
    }

    function json($text, $string, $int) {
        $result = [];
        for ($i = 0; $i < count($text); $i++) {
            array_push($result, [
                "text" => $string[$i],
                "weight" => $text[$i][count($text[$i])-1],
                "probability" => round($text[$i][count($text[$i])-1]/$int[0],4)
            ]);
        }
        return $result;
    }

    function practiceJson($chance, $string) {
        $result = [];
        for ($i = 0; $i < count($string); $i++) {
            array_push($result, [
                "text" => $string[$i],
                "count" => $chance[$i + 1],
                "calculated_probability" => round($chance[$i + 1]/array_sum($chance),4)
            ]);
        }
        return $result;
    }
    $textarea = setArray($textarea);
    $textarea = upgrade($textarea);
    for ($i = 0; $i < count($textarea); $i++) {
        $counter[0] = $counter[0] + $textarea[$i][count($textarea[$i])-1];
    }

    $arrayWithNotElem = deleteElement($textarea);
    for ($i = 0;$i < count($arrayWithNotElem);$i++) {
        $arrayWithNotElem[$i] = implode(" ", $arrayWithNotElem[$i]);
    }

    $resultSet["sum"] = $counter[0];
    $resultSet["date"] = json($textarea,$arrayWithNotElem,$counter);
    print_r(json_encode($resultSet, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)."<br><br>");





    $chance = array();
    for ($i = 0; $i < count($textarea); $i++) {
        $chance[$i + 1] = round($textarea[$i][count($textarea[$i])-1]/$counter[0],4);
    }


    include_once ('generate.php');
    $realResult = request($arrayWithNotElem, $chance, $num);


    $endResult = practiceJson($realResult, $arrayWithNotElem);
    print_r(json_encode($endResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

}
else
    {
        echo "Введите значение плиз";
    }