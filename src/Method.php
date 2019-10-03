<?php

namespace MondialRelay;

use MondialRelay\Exceptions\ParameterException;
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
        $this->parameter = new Parameter($this->methodParameters(), $this->regexPatterns());
        $this->parameters = $this->parameter->setParameters($parameters);
        if ($this->parameter->getErrors()) {
            throw new ParameterException;
        }
    }

    /**
     * Get parameters
     *
     * @return array
     */
    public function getParameters() : array {
        return $this->parameter->getMethodParameters();
    }

    /**
     * Make request
     *
     * @return self
     */
    public function request() : self
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