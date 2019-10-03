<?php

namespace MondialRelay\Parameters;

use MondialRelay\Contracts\CountryParameterInterface;

/**
 * Postal code parameter
 */
class PostalCode extends CountryParameter implements CountryParameterInterface
{
    /**
     * Regex patterns
     *
     * @var array
     */
    public function regexPatterns() {
        return [
            'DE' => "/^[0-9]{5}$/",
            'BE' => "/^[0-9]{4}$/",
            'ES' => "/^[0-9]{5}$/",
            'FR' => "/^[0-9]{5}$/",
            'IT' => "/^[0-9]{5}$/",
            'LU' => "/^[0-9]{5}$/",
            'PT' => "/^[0-9]{4}(-[0-9]{3})?$/",
            'GB' => "/^(\w{1,2}?)\d[\w\d]{0,2}[ ]?[\w\d]\w{2}$/",
            'IE' => "/^[0-9A-Z ]{0,10}$/",
            'NL' => "/^[0-9 A-Z]{4,7}$/",
            'AT' => "/^[0-9]{4}$/",
        ];
    }
}