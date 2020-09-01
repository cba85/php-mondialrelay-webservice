<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

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

    public function testSearchPostcodeWithoutRequiredParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Pays' => 'FR',
            'Ville' => 'Paris',
        ];

        $mondialrelay->searchPostcode($parameters)->getResults();
    }

    public function testSearchPostcodeUsingBadParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Pays' => 'ERROR',
            'Ville' => 'Paris',
            'NbResult' => 5
        ];

        $mondialrelay->searchPostcode($parameters)->getResults();
    }
}
