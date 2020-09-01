<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Create label
 */
class SearchPostcode extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name()
    {
        return "WSI2_RechercheCP";
    }

    /**
     * Required parameters
     *
     * @return array
     */
    public function requiredParameters(): array
    {
        return [
            'Pays',
            'Ville',
            'NbResult',
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
            'Pays' => "/^[A-Za-z]{2}$/",
            'Ville' => "/^[A-Za-z_\-']{2,25}$/",
            'CP' => null,
            'NbResult' => null
        ];
    }
}
