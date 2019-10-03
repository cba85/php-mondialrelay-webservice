<?php

namespace MondialRelay\Exceptions;

use Exception;

class ParameterException extends Exception
{
    protected $message = "Bad parameters.";
}