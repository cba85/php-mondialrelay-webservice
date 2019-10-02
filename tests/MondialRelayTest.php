<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class MondialRelayTest extends TestCase
{
    public function testMondialRelayWebserviceSearchPostcode()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'Pays' => 'FR',
            'Ville' => 'Paris',
            'CP' => '75010',
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
            'Pays'           => 'US',
            'Ville'          => 'Paris',
            'CP'             => '75010',
            'NbResult'       => 5
        ];
        $searchPostcode = $mondialrelay->searchPostcode($parameters)->getErrorMessage();
        $this->assertIsString($searchPostcode);
    }

    /*
    public function testMondialRelayWebserviceSearchParcelshop()
    {
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