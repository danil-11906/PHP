<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" name="textarea" placeholder="textarea">
    <input type="text" name="string" placeholder="string">
    <input type="submit" name="go" value="Отослать!">
</form>
</body>
</html>
<?php
$textarea = $_POST['textarea'];
$string = $_POST['string'];
$text = 0;
$array = array();
$num = 0;
for ($i=0;$i<strlen($textarea);$i++) {
    switch ($textarea[$i]) {
        case "+" :
            if ($array[$num]=='11111111') {
                $array[$num]=='00000000';
            }else {
                $array[$num]++;
            }
            break;
        case "-" :
            if ($array[$num]=='00000000') {
                $array[$num]=='11111111';
            }else {
                $array[$num]--;
            }
            break;
        case ">" :
            $num++;
            if (!isset($array[$num])) {
                $array[$num] = '00000000';
            }
            break;
        case "<" :
            $num--;
            if (!isset($array[$num])) {
                $array[$num] = '00000000';
            }
            break;
        case "," :
            $array[$num] = ord($string[$text]);
            $text++;
            break;
        case "." :
            print chr($array[$num]);
            break;
        case "[" :
            if (!$array[$num]) {
                $counter = 1;
                while ($counter) {
                    $i++;
                    if ($textarea[$i] == "[") {
                        $counter++;
                    } else if ($textarea[$i] == "]") {
                        $counter--;
                    }
                }
            }
            break;
        case "]" :
            if ($array[$num]) {
                $counter = 1;
                while ($counter) {
                    $i--;
                    if ($textarea[$i] == "]") {
                        $counter++;
                    } else if ($textarea[$i] == "[") {
                        $counter--;
                    }
                }
            }
            break;
    }
}



//$source = "++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>. ";
//$source = array_values(array_filter(preg_split('//', $source)));
//$string = $_REQUEST('textarea');
//echo $string;
//
//$chain = array(0);
//$cell = 0;
//$brackets = 0;
//for ($i = 0; $i < count($source); ++$i) {
//    switch ($textarea[$i]) {
//        case "+" :
//            // увеличиваем значение текущей ячейки
//            $chain[$cell]++;
//            break;
//        case "-" :
//            // уменьшаем значение текущей ячейки
//            $chain[$cell]--;
//            break;
//        case "." :
//            // выводим символ
//            print chr($chain[$cell]);
//            break;
//        case "," :
//            // считать символ из STDIN
//            $chain[$cell] = ord(fgetc(STDIN));
//            break;
//        case ">" :
//            // переход к следующей ячейке
//            $cell++;
//            if (!isset($chain[$cell])) {
//                $chain[$cell] = 0;
//            }
//            break;
//        case "<" :
//            // переход к предыдущей ячейке
//            $cell--;
//            if (!isset($chain[$cell])) {
//                $chain[$cell] = 0;
//            }
//            break;
//        case "[" :
//            // начало цикла
//            if (!$chain[$cell]) {
//                $brackets = 1;
//                while ($brackets) {
//                    $i++;
//                    if ($source[$i] == "[") {
//                        // был открыт вложенный цикл
//                        $brackets++;
//                    } else if ($source[$i] == "]") {
//                        // цикл закрыт
//                        $brackets--;
//                    }
//                }
//            }
//            break;
//        case "]" :
//            // конец цикла
//            if ($chain[$cell]) {
//                $brackets = 1;
//                while ($brackets) {
//                    $i--;
//                    if ($source[$i] == "]") {
//                        // был закрыт вложенный цикл
//                        $brackets++;
//                    } else if ($source[$i] == "[") {
//                        // цикл открыт
//                        $brackets--;
//                    }
//                }
//            }
//            break;
//    }
//}