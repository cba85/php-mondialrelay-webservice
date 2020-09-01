<?php

namespace MondialRelay\Contracts;

/**
 * Method interface
 */
interface MethodInterface
{
    public function name();
    public function requiredParameters();
    public function regexPatterns();
}
