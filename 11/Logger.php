<?php
use Psr\Log\LogLevel;
use Psr\Log\LoggerInterface;

spl_autoload_register(function ($class) {
    require_once "vendor\psr\log\\".$class.'.php';
});

class Logger implements \Psr\Log\LoggerInterface
{

    public function json($type, $message)
    {
        $date = date('H:i j.M.Y');
        $array = array(
            'Type' => $type,
            'Time' => $date,
            'Message' => $message,
        );
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }

    public function outLog($type, $message)
    {
        $json = $this->json($type, $message);
        $fileName = 'file.json';
        $array = array();
        if (file_exists($fileName))
        {
            $string = file_get_contents($fileName);
            if (strlen($string) != 0)
            {
                $array = json_decode($string);
            }
        }
        array_push($array,json_decode($json));
        file_put_contents($fileName, json_encode($array, JSON_UNESCAPED_UNICODE));
    }

    public function emergency($message, array $context = array())
    {
        // TODO: Implement emergency() method.
        $this->outLog(LogLevel::EMERGENCY, $message);
    }

    public function alert($message, array $context = array())
    {
        // TODO: Implement alert() method.
        $this->outLog(LogLevel::ALERT, $message);
    }

    public function critical($message, array $context = array())
    {
        // TODO: Implement critical() method.
        $this->outLog(LogLevel::CRITICAL, $message);
    }

    public function error($message, array $context = array())
    {
        // TODO: Implement error() method.
        $this->outLog(LogLevel::ERROR, $message);
    }

    public function warning($message, array $context = array())
    {
        // TODO: Implement warning() method.
        $this->outLog(LogLevel::WARNING, $message);
    }

    public function notice($message, array $context = array())
    {
        // TODO: Implement notice() method.
        $this->outLog(LogLevel::NOTICE, $message);
    }

    public function info($message, array $context = array())
    {
        // TODO: Implement info() method.
        $this->outLog(LogLevel::INFO, $message);
    }

    public function debug($message, array $context = array())
    {
        // TODO: Implement debug() method.
        $this->outLog(LogLevel::DEBUG, $message);
    }

    public function log($level, $message, array $context = array())
    {
        // TODO: Implement log() method.
        $this->outLog($level,$message);
    }
}