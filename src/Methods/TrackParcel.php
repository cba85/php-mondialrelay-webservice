<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Track parcel
 */
class TrackParcel extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name()
    {
        return "WSI2_TracingColisDetaille";
    }

    /**
     * Required parameters
     *
     * @return array
     */
    public function requiredParameters(): array
    {
        return [
            'Expedition',
            'Langue',
        ];
    }

    /**
     * Regex patterns
     *
     * @return array
     */
    public function regexPatterns()
    {
        return [
            'Enseigne' => "/^[0-9A-Z]{2}[0-9A-Z]{6}$/",
            'Expedition' => "/^[0-9]{8}$/",
            'Langue' => "/^[A-Z]{2}$/"
        ];
    }
}
