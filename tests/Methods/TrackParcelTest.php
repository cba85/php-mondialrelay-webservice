<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class TrackParcelTest extends TestCase
{
    public function testTrackParcel()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Expedition' => '31004640',
            'Langue' => 'FR'
        ];

        $trackParcel = $mondialrelay->trackParcel($parameters)->getResults();

        $this->assertSame('95', $trackParcel->STAT); // Compte Enseigne non activé
    }

    public function testTrackParcelWithoutRequiredParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Langue' => 'FR'
        ];

        $mondialrelay->trackParcel($parameters)->getResults();
    }

    public function testTrackParcelUsingBadParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Expedition' => 'ERROR',
            'Langue' => 'FR'
        ];

        $mondialrelay->trackParcel($parameters)->getResults();
    }
}
