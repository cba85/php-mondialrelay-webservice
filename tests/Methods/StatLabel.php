<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class StatLabelTest extends TestCase
{
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
}
