<?php
namespace MondialRelay;

use MondialRelay\Traits\Method;
use MondialRelay\Traits\Parameter;
use MondialRelay\Traits\Webservice as WebserviceTrait;
use SoapClient;

/**
 * Mondial Relay webservice
 */
class Webservice
{
    use Method;
    use Parameter;
    use WebserviceTrait;

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
    private $method;

    /**
     * Mondial Relay webservice constructor.
     *
     * @param $vatId
     */
    public function __construct(string $merchant, string $privateKey)
    {
        if (!$this->checkParameter('merchant', $merchant) or !$this->checkParameter('privateKey', $privateKey)) {
            throw new Exception("Bad parameters");
        }
        $this->merchant = $merchant;
        $this->privateKey = $privateKey;
        $this->client = new SoapClient(self::URL);
    }
}