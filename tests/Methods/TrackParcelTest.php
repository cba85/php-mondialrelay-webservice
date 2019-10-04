<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class TrackParcelTest extends TestCase
{
    public function testTrackParcel()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Expeditions' => '31004640',
            'Langue' => 'FR'
        ];

        $trackParcel = $mondialrelay->trackParcel($parameters)->getResults();

        $this->assertSame('95', $trackParcel->STAT); // Compte Enseigne non activé
    }
}
