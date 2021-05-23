<?php
require_once ("Logger.php");

class Test
{
    public $message;
    public $type;
    public function __construct($message, $type)
    {
        $this->type=$type;
        $this->message=$message;
        $this->log();
    }

    public function log()
    {
        $logger = new Logger();
        switch ($this->type)
        {
            case 'emergency':
                $logger->emergency($this->message);
                break;
            case 'alert':
                $logger->alert($this->message);
                break;
            case 'debug':
                $logger->debug($this->message);
                break;
            case 'info':
                $logger->info($this->message);
                break;
            case 'notice':
                $logger->notice($this->message);
                break;
            case 'warning':
                $logger->warning($this->message);
                break;
                break;
            case 'critical':
                $logger->critical($this->message);
                break;
            case 'error':
                $logger->error($this->message);
                break;
        }
    }
}
