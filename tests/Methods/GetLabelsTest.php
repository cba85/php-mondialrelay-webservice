<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class GetLabelsTest extends TestCase
{
    public function testMondialRelayWebserviceGetLabels()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Expeditions' => '31004640',
            'Langue' => 'FR'
        ];

        $getLabels = $mondialrelay->getLabels($parameters)->getResults();

        $this->assertSame('0', $getLabels->STAT);
    }
}
