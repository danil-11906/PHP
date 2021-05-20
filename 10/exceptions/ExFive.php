<?php
namespace Exceptions;

require_once('ExOne.php');

class ExFive extends ExOne
{
    public function __construct()
    {
        parent::__construct("ExFive");
    }
}