<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class MondialRelayTest extends TestCase
{
    public function testMondialRelay()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $parameters = [
            'ModeCol' => 'ModeCol',
            'ModeLiv' => 'frefe'
        ];
        $mondialrelay->createLabel($parameters);
    }
}