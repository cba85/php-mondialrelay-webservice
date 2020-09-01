<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Stat label
 */
class StatLabel extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name(): string
    {
        return "WSI2_STAT_Label";
    }

    /**
     * Required parameters
     *
     * @return array
     */
    public function requiredParameters(): array
    {
        return [
            'STAT_ID',
            'Langue',
        ];
    }

    /**
     * Regex patterns
     *
     * @return array
     */
    public function regexPatterns(): array
    {
        return [
            'Enseigne' => "/^[0-9A-Z]{2}[0-9A-Z]{6}$/",
            'STAT_ID' => "/^[0-9]{1,3}$/",
            'Langue' => "/^[A-Z]{2}$/"
        ];
    }
}
