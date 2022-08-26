<?php

namespace app\exceptions;

class CommandNotDefinedException extends \Exception
{
    protected $code = 404;
    protected $message = "Command Not Defined in Console. Please Enter Command";
}