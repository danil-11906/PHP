<?php
namespace Exceptions;
use Exception;

class ExOne extends Exception
{
    public function __construct($message = "ExOne")
    {
        parent::__construct($message);
    }
}