<?php
require_once('Logger.php');
class LoggerToFile extends Logger{

    public $string;
    public $file;

    public function __construct($string, $file){
        $this->string=$string;
        $this->file=fopen($file,"a");
    }

    public function out()
    {
        // TODO: Implement out() method.
        $string = $this->answer($this->string);
        fwrite($this->file, $string);
    }

    public function __destruct(){
        fclose($this->file);
    }
}