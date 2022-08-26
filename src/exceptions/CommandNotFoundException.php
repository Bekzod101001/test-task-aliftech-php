<?php

namespace app\exceptions;

class CommandNotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "Command Not Found";
}