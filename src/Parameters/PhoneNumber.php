<?php

namespace MondialRelay\Parameters;

use MondialRelay\Contracts\CountryParameterInterface;

/**
 * Phone number parameter
 */
class PhoneNumber extends CountryParameter implements CountryParameterInterface
{
    /**
     * Regex patterns
     *
     * @var array
     */
    public function regexPatterns() : array {
        return [
        'FR' => "/^((\+)33)[1-9][0-9]{8}$/",
        'BE' => "/^(((\+)32)[0-9]{8})|((\+)32)[4][0-9]{8}$/",
        'LU' => "/^((\+)352)[0-9]{6,10}$/",
        'PT' => "/^((\+)351)[0-9]{9}$/",
        'ES' => "/^(((\+)34)9[0-9]{8})|((\+)34)6[0-9]{8}$/",
        'DE' => "/^((\+)49)[0-9]{10,11}$/",
        'IT' => "/^((\+)39)[0-9]{10}$/",
        'Monaco' => "/^((\+)377)[0-9]{5}$/"
    ];
}
}
