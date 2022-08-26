<?php

namespace app\exceptions;

class RecordNotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "Record not found in table";
}