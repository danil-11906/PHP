<html lang="ru">
<head>
    <title>Календарь</title>
    <meta charset="utf-8">
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    <h3>Выберите месяц</h3>
    <input type="month" name="month"><br><br>
    <input type="submit" name="go" value="Показать">
</form>



<?php
if (isset($_REQUEST['go'])){



    echo "<table>
        <thead>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th bgcolor='red'>Сб</th>
            <th bgcolor='red'>Вс</th>
        </thead>
        <tbody>";



    $month=$_REQUEST['month'];
    $day="";
    if ($month==null){
        $month=date("Y-m-d");
//        echo "<br><br>".$month."<br><br>";
        $day=substr($month,8,2);
    }
    $date=date_parse($month);
//    "<br><br>".print_r($month)."<br><br>";
    $year=$date['year'];
    $month=$date['month'];
    echo "<h1>".$month.".".$year;
    $realDayWeek=1;
    $realDayOfWeek = date('N', mktime(0, 0, 0, $month, "01", $year));


    if ($realDayOfWeek != $realDayWeek) {
        $arrayDayOfWeek = $realDayOfWeek - $realDayWeek;
        for ($i = 0; $i < $arrayDayOfWeek; $i++) {
            echo "<td></td>";
            $realDayWeek++;
        }
    }

    $begin =DateTime::createFromFormat('j-m-Y', '1-'.$month.'-'.$year);
    $end = DateTime::createFromFormat( 'j-m-Y',(cal_days_in_month(CAL_GREGORIAN, $month,$year)+1).'-'.$month.'-'.$year);
    $interval = new DateInterval('P1D');
    $dateRange = new DatePeriod($begin, $interval ,$end);
//    print_r($dateRange);

    foreach($dateRange as $date){
        if ($date->format("N")>=6){
            echo "<td bgcolor=red>"; }
        else{
            echo "<td>";
        }
        if ($day==($date->format("j"))){
            echo "<strong>".$day."</strong></td>";
        }else{
            echo $date->format("j")."</td>";
        }
        if ($date->format("N")== 7) {
            echo "</tr><tr>";
        }
    }
}?>

</tbody>
</table>
</body>
</html>