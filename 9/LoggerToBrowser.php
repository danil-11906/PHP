<?php
require_once('Logger.php');
class LoggerToBrowser extends Logger {

    public $string;
    public $date;

    public function __construct($string,$date){
        $this->string=$string;
        $this->date=$date;
    }

    public function out()
    {
        // TODO: Implement out() method.
        if (($this->date)=='t'){
            echo date('H-i').': ';
        }
        if (($this->date)=='dt'){
            echo date('H-i j M Y ').': ';
        }
        echo $this->answer($this->string);
    }
}