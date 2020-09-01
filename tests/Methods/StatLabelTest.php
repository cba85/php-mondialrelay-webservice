<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class StatLabelTest extends TestCase
{
    public function testStatLabel()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'STAT_ID' => 97,
            'Langue' => 'FR'
        ];

        $statLabel = $mondialrelay->statLabel($parameters)->getResults();

        $this->assertIsString($statLabel);
    }

    public function testStatLabelWithoutRequiredParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'STAT_ID' => 97,
        ];

        $mondialrelay->statLabel($parameters)->getResults();
    }

    public function testStatLabelUsingBadParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'STAT_ID' => 97,
            'Langue' => 'ERROR'
        ];

        $mondialrelay->statLabel($parameters)->getResults();
    }
}
