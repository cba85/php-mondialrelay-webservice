<?php

namespace MondialRelay\Traits;

use Exception;

/**
 * Parameter trait
 */
trait Parameter
{
    /**
     * Get regex parameters
     *
     * @return array
     */
    protected function getRegexParameters()
    {
        return require __DIR__ . '/../config/regex.php';
    }

    /**
     * Get regex check of a parameter
     * @param string $type
     * @return string
     */
    protected function getRegexParameter(string $type)
    {
        if (in_array($type, $this->getRegexParameters())) {
            return $this->getRegexParameters()[$type];
        }
        return null;
    }

    /**
     * Check parameter
     * @param string $type
     * @param string $parameter
     * @return int
     */
    public function checkParameter(string $type, string $parameter)
    {
        if ($regex = $this->getRegexParameter($type)) {
            if (!preg_match($regex, $parameter)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check and set parameters
     *
     * @param string $method
     * @param array $parameters
     * @return array
     */
    public function setParameters(string $method, array $parameters)
    {
        $webserviceParameters = require __DIR__ . "/../config/methods/{$method}.php";
        $webserviceParameters['Enseigne'] = strtoupper($this->merchant);
        foreach ($parameters as $key => $parameter) {
            if (array_key_exists($key, $webserviceParameters)) {
                if ($this->checkParameter($key, $parameter)) {
                    $webserviceParameters[$key] = strtoupper($parameter);
                }
            }
        }
        $webserviceParameters['Security'] = $this->createSecurityCode($webserviceParameters);
        return $webserviceParameters;
    }

    /**
     * Create security code
     * @param  array $parameters
     * @return string
     */
    public function createSecurityCode($parameters)
    {
        $code = implode("", $parameters);
        $code .= $this->privateKey;
        return strtoupper(md5($code));
    }

}