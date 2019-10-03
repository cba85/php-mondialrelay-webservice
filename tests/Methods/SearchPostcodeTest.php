<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;
use MondialRelay\Exceptions\ParameterException;

final class SearchPostCodeTest extends TestCase
{
    public function testSearchPostcode()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'Pays' => 'FR',
            'Ville' => 'Paris',
            'NbResult' => 5
        ];
        $searchPostcode = $mondialrelay->searchPostcode($parameters)->getResults();
        $this->assertSame('0', $searchPostcode->STAT);
    }

    public function testSearchPostcodePostCodeParameterError()
    {
        $this->expectException(ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'Pays' => 'FR',
            'Ville' => 'Paris',
            'CP' => '750100',
            'NbResult' => 5
        ];
        $searchPostcode = $mondialrelay->searchPostcode($parameters)->getResults();
        $this->assertSame('0', $searchPostcode->STAT);
    }

    public function testSearchPostcodeError()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'Pays' => 'US',
            'Ville' => 'Paris',
            'CP' => '75010',
            'NbResult' => 5
        ];
        $searchPostcode = $mondialrelay->searchPostcode($parameters)->getErrorMessage();
        $this->assertIsString($searchPostcode);
    }

    public function testSearchPostcodeParameterError()
    {
        $this->expectException(ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'Pays' => 'USFE',
            'Ville' => 'Paris',
            'CP' => '75010',
            'NbResult' => 5
        ];
        $searchPostcode = $mondialrelay->searchPostcode($parameters)->getErrorMessage();
        $this->assertIsString($searchPostcode);
    }
}
