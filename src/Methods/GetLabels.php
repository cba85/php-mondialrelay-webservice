<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Get labels
 */
class GetLabels extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name()
    {
        return "WSI3_GetEtiquettes";
    }

    /**
     * Required parameters
     *
     * @return array
     */
    public function requiredParameters(): array
    {
        return [
            'Expeditions',
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
            'Expeditions' => "/^[0-9]{8}(;[0-9]{8})*$/",
            'Langue' => "/^[A-Z]{2}$/"
        ];
    }
}
