<?php
namespace MondialRelay;

use MondialRelay\Traits\Action;
use MondialRelay\Traits\Parameter;
use SoapClient;

/**
 * Mondial Relay webservice
 */
class Webservice
{
    use Action;
    use Parameter;

    /**
     * @const URL
     */
    const URL = 'https://api.mondialrelay.com/Web_Services.asmx?WSDL';

    /**
     * @var SoapClient
     */
    private $client;

    /**
     * @var string
     */
    private $merchant;

    /**
     * @var string
     */
    private $privateKey;

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