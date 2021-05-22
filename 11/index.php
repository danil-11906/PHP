<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
    <input type="text" name="message">
    <select name="type">
        <option selected value="emergency">emergency</option>
        <option value="alert">alert</option>
        <option value="critical">critical</option>
        <option value="error">error</option>
        <option value="warning">warning</option>
        <option value="notice">notice</option>
        <option value="info">info</option>
        <option value="debug">debug</option>
    </select>
    <input type="submit" name="send" value="send">
</form>

<?php
include_once ("Test.php");
if (isset($_REQUEST['send']))
{
    $string = $_REQUEST['message'];
    if (strlen($string) == 0)
    {
        echo "Please write string";
    }
    else
    {
        $type = $_REQUEST['type'];
        $test = new Test($string, $type);
    }
}
?>

</body>
</html>

