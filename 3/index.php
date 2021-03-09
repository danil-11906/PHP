<?php
include_once('Task.html');
$textarea = $_REQUEST['textarea'];
if (!empty($textarea)) {
    function random($string)
    {
        $array = "";
        $sort = explode(" ", $string);
        shuffle($sort);
        for ($i = 0; $i < count($sort); $i++) {
            $array = $array.$sort[$i]." ";
        }
        $array = trim($array);
        return $array;
    }

    function rez($string)
    {
        $array = array();
        $sort = explode("\n", $string);
        for ($i = 0; $i < count($sort); $i++) {
            array_push($array, random($sort[$i]));
        }
        return $array;
    }

    $array = rez($textarea);
    $textarea = explode("\n", $textarea);
    $res = array_merge($array,$textarea);
    $result = $res;


    for ($i = 0;$i < count($res);$i++) {
        $res[$i] = explode(" ", $res[$i]);
    }
    for ($k = 0;$k < count($result)*count($result); $k++) {
        for ($i = 0; $i < count($result); $i++) {
            if (strcmp($res[$i][1], $res[$i + 1][1]) == 1) {
                list($result[$i],$result[$i + 1]) = array($result[$i + 1],$result[$i]);
                list($res[$i][1],$res[$i + 1][1]) = array($res[$i + 1][1],$res[$i][1]);
            }
        }
    }
    foreach ($result as $res) {
        echo $res."<br>";
    }
}
else
    {
        echo "Введите значение";
    }