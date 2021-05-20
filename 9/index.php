
<html lang="ru">
<head>
    <title>Ping/Tracert</title>
    <meta charset="utf-8">
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" id="form" >
    <input type="text" name="string" placeholder="String"> <br />
    <input type="radio" name="log" value="b" onclick="browser()" />Browser<br>
    <input type="radio" name="log" value="f" onclick="file()" id="f"/>File<br>
    <input type="submit" name="send" value="Отправить!"id="send">
</form>
<script>
    var parent=document.getElementById('form');
    function file(){
        var fileName=document.createElement('input');
        fileName.className='fileName';
        fileName.id='fileName';
        fileName.name='fileName';
        fileName.placeholder="fileName"
        before=document.getElementById('send');
        parent.insertBefore(fileName,before);

    }

    function browser(){
        if (!document.getElementById('br')){
            var br=document.createElement('div');
            br.id='br';
            br.innerHTML='<input type="radio" name="br" value="t"/>Time<br>' +
                '<input type="radio" name="br" value="dt" id="f"/>Date,Time<br>' +
                '<input type="radio" name="br" value="n" checked="true" id="f"/>Without date and without time<br>';
            before=document.getElementById('f');
            br.style.marginLeft="25px";
            parent.insertBefore(br,before);

        }
    }
</script>


<?php

if (isset($_REQUEST['send'])){
    require_once('LoggerToFile.php');
    require_once('Logger.php');
    require_once('LoggerToBrowser.php');
    $str=$_REQUEST['string'];
    if (strlen($str)==0){
        echo "Please write string";
    }
    else{
        if( isset( $_REQUEST['log'] ) )
        {
            if ( $_REQUEST['log']=='b'){
                $log=new LoggerToBrowser($str,$_REQUEST['br']);
            }
            else{
                $log= new LoggerToFile($str,$_POST['fileName']);
            }
            $log->out();
        }
        else{echo 'Please write name of file';}
    }
}?>
</body>
</html>