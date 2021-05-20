<?php
namespace Exceptions;

require_once('ExTwo.php');

class ExThree extends ExTwo
{
    public function __construct()
    {
        parent::__construct("ExThree");
    }
}