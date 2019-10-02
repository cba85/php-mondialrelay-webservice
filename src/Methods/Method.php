<?php

namespace MondialRelay\Methods;

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
    protected $parameters;

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
     * Get parameters
     *
     * @return void
     */
    public function parameters()
    {
        return $this->parameters;
    }

    /**
     * Make request
     *
     * @return self
     */
    public function make()
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