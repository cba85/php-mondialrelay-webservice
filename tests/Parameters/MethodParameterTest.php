<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Parameter;
use MondialRelay\Webservice;
use MondialRelay\Exceptions\ParameterException;

final class MethodParameterTest extends TestCase
{
    public function testInstanceParameter()
    {
        $methodsParameters = [
            'Enseigne' => null,
            'Pays' => null,
            'Ville' => null,
            'CP' => null,
            'NbResult' => null
        ];

        $regexPatterns = [
            'Enseigne' => "/^[0-9A-Z]{2}[0-9A-Z]{6}$/",
            'Pays' => "/^[A-Za-z]{2}$/",
            'Ville' => "/^[A-Za-z_\-']{2,25}$/",
            'CP' => null,
            'NbResult' => null
        ];

        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $this->assertIsObject($parameter);
    }

    public function testSetParameterOk()
    {
        $methodsParameters = ['Pays' => null];
        $regexPatterns = ['Pays' => "/^[A-Za-z]{2}$/"];
        $parameters = [
            'Enseigne' => "BDTEST13",
            'PrivateKey' => "PrivateK",
            "Pays" => "FR"
        ];
        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $settedParameters = $parameter->setParameters($parameters);
        $this->assertEmpty($parameter->getErrors());
    }

    public function testSetParameterKo()
    {
        $methodsParameters = ['Pays' => null];
        $regexPatterns = ['Pays' => "/^[A-Za-z]{2}$/"];
        $parameters = [
            'Enseigne' => "BDTEST13",
            'PrivateKey' => "PrivateK",
            "Pays" => "ERROR"
        ];
        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $settedParameters = $parameter->setParameters($parameters);
        $this->assertNotEmpty($parameter->getErrors());
    }

    public function testSetWrongParameter()
    {
        $this->expectException(ParameterException::class);
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'STAT_ID' => 97,
            'Langue' => 'FR',
            'WrongParameter' => "value"
        ];

        $statLabel = $mondialrelay->statLabel($parameters)->getResults();
    }
}
