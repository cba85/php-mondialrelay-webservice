<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Parameter;

final class PostalCodeParameterTest extends TestCase
{
    public function testSetParameterOk()
    {
        $methodsParameters = ['CP' => null, 'Pays' => null];
        $regexPatterns = ['CP' => null, 'Pays' => null];
        $parameters = [
            'Enseigne' => "BDTEST13",
            'PrivateKey' => "PrivateK",
            'Pays' => "FR",
            'CP' => "75010",
        ];
        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $settedParameters = $parameter->setParameters($parameters);
        $this->assertEmpty($parameter->getErrors());
    }

    public function testSetParameterKo()
    {
        $methodsParameters = ['CP' => null, 'Pays' => null];
        $regexPatterns = ['CP' => null, 'Pays' => null];
        $parameters = [
            'Enseigne' => "BDTEST13",
            'PrivateKey' => "PrivateK",
            'Pays' => "FR",
            'CP' => "750100",
        ];
        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $settedParameters = $parameter->setParameters($parameters);
        $this->assertNotEmpty($parameter->getErrors());
    }
}
