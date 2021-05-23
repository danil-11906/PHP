<?php
$string = '';

if(isset($_POST['textarea']))
{
    $string = $_POST['textarea'];
}

if ((!isset($_COOKIE['textarea']))&(strlen($string)!=0))
{
    setcookie('textarea',$string);
    post($string);
}

else
{
    if ($_COOKIE['textarea']!=$string)
    {
        echo "Неверная строка.\n Ожидалось: ".$_COOKIE['textarea'];
    }
    else
    {
        post($string);
    }
}

function post($string)
{
    $parameters = array(
        'textarea' => $string
    );
    $content = http_build_query($parameters);
    $response = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $content,
        )
    );
    $context  = stream_context_create($response);
    $result = file_get_contents('http://localhost/Task.php', false, $context);
    echo $result;
}