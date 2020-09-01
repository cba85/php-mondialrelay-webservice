<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class SearchParcelShopTest extends TestCase
{
    public function testSearchParcelshop()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Pays' => "FR",
            'CP' => "75010",
            'RayonRecherche' => "20",
            'NombreResultats' => "20",
        ];

        $searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResults();

        $this->assertSame('0', $searchParcelshop->STAT);
    }

    public function testSearchParcelshopWithoutRequiredParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Pays' => "FR",
            'CP' => "75010",
        ];

        $mondialrelay->searchParcelshop($parameters)->getResults();
    }

    public function testSearchParcelshopUsingBadParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Pays' => "FR",
            'CP' => "ERROR",
            'RayonRecherche' => "20",
            'NombreResultats' => "20",
        ];

        $mondialrelay->searchParcelshop($parameters)->getResults();
    }
}
