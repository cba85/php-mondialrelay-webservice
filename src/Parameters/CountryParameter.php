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

        if (!preg_match($this->regexPatterns()[$country], $value)) {
            return false;
        }
        return true;
    }
}
