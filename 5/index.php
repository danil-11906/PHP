<?php
include_once('Task.html');
$password = $_REQUEST['textarea'];
if (!empty($password)) {
    function valid($str, &$error) //Илья Ефимович, здравствуйте, передачу по ссылке нашел из материала в интернете
    {
        if (strlen($str) <= 10) {
            $error = "Длина пароля менее 10 символов";
            return false;
        }
        if (!preg_match("/[a-z]{1,3}/", $str)) {
            $error = "Пароль должен содержать не менее 2 строчные буквы";
            return false;
        }
        if (!preg_match("/[A-Z]{1,3}/", $str)) {
            $error = "Пароль должен содержать не менее 2 прописные буквы";
            return false;
        }
        if (!preg_match("/[0-9]{1,3}/", $str)) {
            $error = "Пароль должен содержать не менее 2 цифры";
            return false;
        }
        if (!preg_match("/[\\%\\$\\#\\_\\*]{1,3}/", $str)) {
            $error = "Пароль должен содержать не менее 2 спец. символа";
            return false;
        }
        if (preg_match("/[a-z]{4}/", $str)) {
            $error = "Пароль не должен содержать более чем 3 строчные буквы подряд";
            return false;
        }
        if (preg_match("/[A-Z]{4}/", $str)) {
            $error = "Пароль не должен содержать более чем 3 Прописные буквы подряд";
            return false;
        }
        if (preg_match("/[0-9]{4}/", $str)) {
            $error = "Пароль не должен содержать более чем 3 цифры подряд";
            return false;
        }
        if (preg_match("/[\\%\\$\\#\\_\\*]{4}/", $str)) {
            $error = "Пароль не должен содержать более чем 3 спец. символа подряд";
            return false;
        }
        return true;
    }
    $error="";
    if (valid($password, $error))
        echo "Пароль прошел проверку!<br/>\r\n";
    else
        echo "Пароль не прошел проверку по причине: <b>$error</b>.<br/>\r\n";
}
else{
    ?>
<script>alert('Введите пароль')</script>
   <?php
}
