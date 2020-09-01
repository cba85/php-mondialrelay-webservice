<?php

namespace MondialRelay;

use MondialRelay\Parameter;
use SoapClient;

abstract class Method
{
    /**
     * SOAP client
     *
     * @var SoapClient
     */
    protected $client;

    /**
     * Parameters
     *
     * @var array
     */
    public $parameters;

    /**
     * Parameter
     *
     * @var Parameter
     */
    public $parameter;

    /**
     * Request
     *
     * @var SoapClient
     */
    protected $request;

    /**
     * Results
     *
     * @var stdClass
     */
    public $results;

    /**
     * Create a method
     *
     * @param SoapClient $client
     * @param array $parameters
     */
    public function __construct(SoapClient $client, array $parameters)
    {
        $this->client = $client;
        $this->parameters = $parameters;
    }

    /**
     * Set and check method parameters
     *
     * @return void
     */
    public function setAndCheckParameters()
    {
        $methodParameters = array_fill_keys(array_keys($this->regexPatterns()), null);
        $this->parameter = new Parameter($methodParameters, $this->regexPatterns(), $this->requiredParameters());
        $this->parameters = $this->parameter->setParameters($this->parameters);
    }

    /**
     * Make request
     *
     * @return self
     */
    public function request(): self
    {
        $this->request = $this->client->{$this->name()}($this->parameters);
        return $this;
    }

    /**
     * Get results
     *
     * @return stdClass
     */
    public function results()
    {
        $result = "{$this->name()}Result";
        return $this->results = $this->request->{$result};
    }
}
