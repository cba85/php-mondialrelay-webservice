<?php

namespace MondialRelay\Parameters;

abstract class CountryParameter
{
    /**
     * Check postal code parameter
     *
     * @param string $country
     * @param string $value
     * @return bool
     */
    public function check(string $country, string $value)
    {
        if (!array_key_exists($country, $this->regexPatterns())) {
            return true;
        }

        $regex = $this->regexPatterns()[$country];
        if (!preg_match($regex, $value)) {
            return false;
        }
        return true;
    }
}