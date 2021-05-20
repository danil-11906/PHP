<?php
abstract class Logger {
    public abstract function out();


    public function answer($string)  {
        $outString= 'Строка < '.$string.' > ';
        if (strcmp($string, strtolower($string))==0){
            $outString.='не ';
        }
        $outString.= "содержит заглавные буквы";
        return $outString;
    }
}