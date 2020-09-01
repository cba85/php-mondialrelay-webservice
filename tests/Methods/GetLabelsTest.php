<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class GetLabelsTest extends TestCase
{
    public function testGetLabels()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Expeditions' => '31004640',
            'Langue' => 'FR'
        ];

        $getLabels = $mondialrelay->getLabels($parameters)->getResults();

        $this->assertSame('0', $getLabels->STAT);
    }

    public function testGetLabelsWithoutRequiredParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Langue' => 'FR'
        ];

        $mondialrelay->getLabels($parameters)->getResults();
    }

    public function testGetLabelsUsingBadParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'Expeditions' => 'ERROR',
            'Langue' => 'FR'
        ];

        $mondialrelay->getLabels($parameters)->getResults();
    }
}
