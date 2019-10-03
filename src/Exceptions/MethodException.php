<?php

namespace MondialRelay\Exceptions;

use Exception;

class MethodException extends Exception
{
    protected $message = "Method does not exist.";
}
