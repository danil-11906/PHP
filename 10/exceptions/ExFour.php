<?php
namespace Exceptions;
use Exception;


class ExFour extends Exception
{
    public function __construct($message = "ExFour")
    {
        parent::__construct($message);
    }
}