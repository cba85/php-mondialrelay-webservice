<?php

namespace MondialRelay\Traits;

/**
 * Webservice trait
 */
trait Webservice
{
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
     * Get parameters
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->method->parameters();
    }

    /**
     * Get error message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        $this->method->results();

        return $this->statLabel($this->method->parameters())->getResults();
    }
}