<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;
use MondialRelay\Exceptions\ParameterException;
use MondialRelay\Exceptions\MethodException;

final class MondialRelayTest extends TestCase
{
    public function testInstanceWebservice()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $this->assertInstanceOf(Webservice::class, $mondialrelay);
    }

    public function testInstanceWebserviceWithMerchantError()
    {
        $this->expectException(ParameterException::class);
        $mondialrelay = new Webservice('THISISANERROR', 'PrivateK');
    }

    public function testInstanceWebserviceWithPrivateKeyError()
    {
        $this->expectException(ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'THISISANERROR');
    }

    public function testCallWrongMethod()
    {
        $this->expectException(MethodException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');
        $results = $mondialrelay->createDelivery()->getResults();
    }
}