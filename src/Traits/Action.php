<?php

namespace MondialRelay\Traits;

/**
 * Action trait
 */
trait Action
{
    /**
     * Search a distribution Point (Parcelshop, Point Relais)
     *
     * @return SoapClient
     */
    public function searchParcelshop($parameters)
    {
        $this->setParameters('search_parcelshop', $parameters);
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI4_PointRelais_Recherche($this->parameters)->WSI4_PointRelais_RechercheResult;
    }

    /**
     * Create a label
     *
     * @param array $parameters
     * @return void
     */
    public function createLabel(array $parameters)
    {
        print_r($parameters);
        print_r($this->setParameters('create', $parameters));
        die();
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI2_CreationEtiquette($this->parameters)->WSI2_CreationEtiquetteResult;
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
        $this->setParameters('search_postcode', $parameters);
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI2_RechercheCP($this->parameters)->WSI2_RechercheCPResult;
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
        $this->setParameters('stat_label', $parameters);
        $this->parameters['Security'] = $this->hash($privateKey);
        return $this->client->WSI2_STAT_Label($this->parameters)->WSI2_STAT_LabelResult;
    }
}