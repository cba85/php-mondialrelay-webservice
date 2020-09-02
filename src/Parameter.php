<?php

namespace MondialRelay;

use MondialRelay\Parameters\PhoneNumber;
use MondialRelay\Parameters\PostalCode;

class Parameter
{
    /**
     * Method parameters
     *
     * @var array
     */
    protected $methodParameters;

    /**
     * Regex patterns
     *
     * @var array
     */
    protected $regexPatterns;

    /**
     * Required parameters
     *
     * @var array
     */
    protected $requiredParameters;

    /**
     * Error
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Parameter name of the country for a postal code
     *
     * @var array
     */
    protected $postalCodeCountryParameterName = [
        'Expe_CP' => 'Expe_Pays',
        'Dest_CP' => 'Dest_Pays',
        'CP' => 'Pays'
    ];

    /**
     * Parameter name of the country for a phone number
     *
     * @var array
     */
    protected $phoneNumberCountryParameterName = [
        'Expe_Tel1' => 'Expe_Pays',
        'Expe_Tel2' => 'Expe_Pays',
        'Dest_Tel1' => 'Dest_Pays',
        'Dest_Tel2' => 'Dest_Pays',
    ];

    /**
     * Constructor
     *
     * @param array $methodParameters
     * @param array $regexPatterns
     * @param array $requiredParameters
     */
    public function __construct(array $methodParameters, array $regexPatterns, array $requiredParameters = [])
    {
        $this->methodParameters = $methodParameters;
        $this->regexPatterns = $regexPatterns;
        $this->requiredParameters = $requiredParameters;
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Get method parameters
     *
     * @return void
     */
    public function getMethodParameters(): array
    {
        return $this->methodParameters;
    }

    /**
     * Get required parameters
     *
     * @return void
     */
    public function getRequiredParameters(): array
    {
        return $this->requiredParameters;
    }

    /**
     * Get regex check of a parameter
     * @param string $key
     * @return string|null
     */
    protected function getRegexParameter(string $key)
    {
        if (array_key_exists($key, $this->regexPatterns)) {
            return $this->regexPatterns[$key];
        }
        return null;
    }

    /**
     * Check parameter
     * @param string $key
     * @param string $parameter
     * @return int
     */
    public function checkParameter(string $key, string $parameter): bool
    {
        if ($regex = $this->getRegexParameter($key)) {
            if (!preg_match($regex, $parameter)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check method required parameters
     *
     * @param array $parameters
     * @return void
     */
    public function checkRequiredParameters(array $parameters)
    {
        foreach ($this->requiredParameters as $key => $requiredParameter) {
            if (!array_key_exists($requiredParameter, $parameters)) {
                $this->errors[$requiredParameter] = 'Missing required parameter.';
            }
        }
    }

    /**
     * Check and set parameters
     *
     * @param array $parameters
     * @return array
     */
    public function setParameters(array $parameters): array
    {
        $postalCode = new PostalCode;
        $phoneNumber = new PhoneNumber;
        $webserviceParameters = $this->methodParameters;
        $webserviceParameters['Enseigne'] = $parameters['Enseigne'];

        // Check required method parameters
        $this->checkRequiredParameters($parameters);

        // Check Regex parameters
        foreach ($parameters as $key => $parameter) {
            $parameter = strtoupper($parameter);
            if (array_key_exists($key, $webserviceParameters)) {
                // Classic regex verification
                if ($this->checkParameter($key, $parameter)) {
                    $webserviceParameters[$key] = $parameter;
                } else {
                    $this->errors[$key] = $parameter;
                }
                // Postal code depending country regex verification
                if (array_key_exists($key, $this->postalCodeCountryParameterName)) {
                    if (!$postalCode->check($parameters[$this->postalCodeCountryParameterName[$key]], $parameter)) {
                        $this->errors[$key] = $parameter;
                    }
                }
                // Phone number depending country regex verification
                if (array_key_exists($key, $this->phoneNumberCountryParameterName)) {
                    if (!$phoneNumber->check($parameters[$this->phoneNumberCountryParameterName[$key]], $parameter)) {
                        $this->errors[$key] = $parameter;
                    }
                }
            } else {
                if ($key != "Enseigne" and $key != 'PrivateKey') {
                    $this->errors[$key] = $parameter;
                }
            }
        }

        $webserviceParameters['Security'] = $this->createSecurityCode($parameters['PrivateKey'], $webserviceParameters);
        return $webserviceParameters;
    }

    /**
     * Create security code
     * @param string $privateKey
     * @param  array $parameters
     * @return string
     */
    public function createSecurityCode($privateKey, $parameters): string
    {
        $code = implode("", $parameters);
        $code .= $privateKey;
        return strtoupper(md5($code));
    }
}
