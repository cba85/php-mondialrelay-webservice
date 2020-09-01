<?php

namespace MondialRelay;

use MondialRelay\Traits\Method;
use SoapClient;
use MondialRelay\Exceptions\ParameterException;

/**
 * Mondial Relay webservice
 */
class Webservice
{
    use Method;

    /**
     * Webservice URL
     *
     * @const URL
     */
    const URL = 'https://api.mondialrelay.com/Web_Services.asmx?WSDL';

    /**
     * Client
     *
     * @var SoapClient
     */
    private $client;

    /**
     * Merchant
     *
     * @var string
     */
    private $merchant;

    /**
     * Private key
     *
     * @var string
     */
    private $privateKey;

    /**
     * Method
     *
     * @var Method
     */
    public $method;

    /**
     * Mondial Relay webservice constructor.
     *
     * @param $vatId
     */
    public function __construct(string $merchant, string $privateKey)
    {
        $parameter = new Parameter(
            $this->getWebserviceParameters($merchant, $privateKey),
            $this->getWebserviceRegexPatterns()
        );
        if (!$parameter->checkParameter('merchant', $merchant) or !$parameter->checkParameter('privateKey', $privateKey)) {
            throw new ParameterException;
        }
        $this->merchant = $merchant;
        $this->privateKey = $privateKey;
        $this->client = new SoapClient(self::URL);
    }

    /**
     * Get webservice parameters
     *
     * @param string $merchant
     * @param string $privateKey
     * @return array
     */
    public function getWebserviceParameters(string $merchant, string $privateKey): array
    {
        return [
            'Enseigne' => $merchant,
            'PrivateKey' => $privateKey
        ];
    }

    /**
     * Get regex patterns
     *
     * @return array
     */
    public function getWebserviceRegexPatterns(): array
    {
        return [
            'merchant' => "/^[0-9A-Z]{2}[0-9A-Z]{6}$/",
            'privateKey' => "/^[0-9A-Za-z]{8}$/"
        ];
    }

    /**
     * add merchant and private key to the parameters
     *
     * @param array $parameters
     * @return void
     */
    public function addMerchantAndPrivateKeyToParameters(array $parameters): array
    {
        return array_merge([
            'Enseigne' => $this->merchant,
            'PrivateKey' => $this->privateKey
        ], $parameters);
    }
}
