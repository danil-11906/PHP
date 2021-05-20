<?php
namespace Exceptions;
use Exception;


class ExTwo extends Exception
{
    public function __construct($message = "ExTwo")
    {
        parent::__construct($message);
    }
}