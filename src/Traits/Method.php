<?php

namespace MondialRelay\Traits;

use MondialRelay\Exceptions\MethodException;

/**
 * Methods trait
 */
trait Method
{
    /**
     * Available methods
     *
     * @var array
     */
    protected $availableMethods = [
        'searchPostcode',
        'statLabel',
        'searchParcelshop',
        'createLabel',
        'createShipping',
        'getLabels',
        'trackParcel'
    ];

    /**
     * Call method
     *
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public function callMethod($name, $arguments)
    {
        $parameters = $this->addMerchantAndPrivateKeyToParameters($arguments[0]);
        $class = "\\MondialRelay\Methods\\" . ucfirst($name);
        $this->method = new $class($this->client, $parameters);
        $this->method->request();
    }

    /**
     * Dynamic method calling
     *
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public function __call($name, $arguments)
    {
        if (in_array($name, $this->availableMethods)) {
            $this->callMethod($name, $arguments);
            return $this;
        }

        if (method_exists($this, $name)) {
            return $this;
        }

        throw new MethodException;
    }

    /**
     * Get results
     *
     * @return object
     */
    public function getResults()
    {
        return $this->method->results();
    }

    /**
     * Get results in Json format
     *
     * @return object
     */
    public function getResultsInJson()
    {
        return json_encode($this->method->results());
    }

    /**
     * Get parameters
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->method->getParameters();
    }

    /**
     * Get error message
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        $this->method->results();

        $parameters = [
            'STAT_ID' => $this->method->results->STAT,
            'Langue' => 'FR'
        ];

        return $this->statLabel($parameters)->getResults();
    }

    /**
     * Get parameters errors
     *
     * @return array
     */
    public function getParametersErrors(): array
    {
        return $this->method->parameter->getErrors();
    }
}