<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;
use MondialRelay\Exceptions\ParameterException;

final class MondialRelayTest extends TestCase
{
    public function testMondialRelayWebserviceSearchPostcode()
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

    public function testMondialRelayWebserviceSearchPostcodePostCodeParameterError()
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

    public function testMondialRelayWebserviceStatLabel()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'STAT_ID' => 97,
            'Langue' => 'FR'
        ];
        $statLabel = $mondialrelay->statLabel($parameters)->getResults();
        $this->assertIsString($statLabel);
    }

    public function testMondialRelayWebserviceSearchPostcodeError()
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

    public function testMondialRelayWebserviceSearchPostcodeParameterError()
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

    /*
    public function testMondialRelayWebserviceSearchParcelshopParemeterError()
    {
         $this->expectException(Exception::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'Pays' => "FR",
            'Ville' => "",
            'CP' => "75010",
            'Latitude' => "",
            'Longitude' => "",
            'Taille' => "",
            'Poids' => "",
            'Action' => "",
            'DelaiEnvoi' => "0",
            'RayonRecherche' => "20",
            'NombreResultats' => "20",
        ];
        $searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResults();
        $this->assertSame('0', $searchParcelshop->STAT);
    }
    */
}