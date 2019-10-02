<?php

namespace MondialRelay\Traits;

use MondialRelay\Methods\CreateLabel;
use MondialRelay\Methods\SearchParcelshop;
use MondialRelay\Methods\SearchPostcode;
use MondialRelay\Methods\StatLabel;

/**
 * Methods trait
 */
trait Method
{
    /**
     * Search a distribution Point (Parcelshop, Point Relais)
     *
     * @param array $parameters
     * @return SoapClient
     */
    public function searchParcelshop(array $parameters)
    {
        $checkedParameters = $this->setParameters('search_parcelshop', $parameters);
        $this->method = new SearchParcelshop($this->client, $checkedParameters);
        $this->method->make();
        return $this;
    }

    /**
     * Create a label
     *
     * @param array $parameters
     * @return self
     */
    public function createLabel(array $parameters)
    {
        $checkedParameters = $this->setParameters('create', $parameters);
        $this->method = new CreateLabel($this->client, $checkedParameters);
        $this->method->make();
        return $this;
    }

    /**
     * Create a shipping
     *
     * @param array $parameters
     * @return void
     */
    public function createShipping($parameters)
    {
        $this->setParameters('create', $parameters);
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI2_CreationExpedition($this->parameters)->WSI2_CreationExpeditionResult;
    }

    /**
     * Get labels
     *
     * @param array $parameters
     * @return void
     */
    public function getLabels($parameters)
    {
        $this->setParameters('get_labels', $parameters);
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI3_GetEtiquettes($this->parameters)->WSI3_GetEtiquettesResult;
    }

    /**
     * Search postcode
     *
     * @param array $parameters
     * @return void
     */
    public function searchPostcode($parameters)
    {
        $checkedParameters = $this->setParameters('search_postcode', $parameters);
        $this->method = new SearchPostcode($this->client, $checkedParameters);
        $this->method->make();
        return $this;
    }

    /**
     * Track parcel
     *
     * @param array $parameters
     * @return void
     */
    public function trackParcel($parameters)
    {
        $this->setParameters('track_parcel', $parameters);
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI2_TracingColisDetaille($this->parameters)->WSI2_TracingColisDetailleResult;
    }

    /**
     * Get status label
     *
     * @param array $parameters
     * @return void
     */
    public function statLabel($parameters)
    {
        $checkedParameters = $this->setParameters('stat_label', $parameters);
        $this->method = new StatLabel($this->client, $checkedParameters);
        $this->method->make();
        return $this;
      }
}