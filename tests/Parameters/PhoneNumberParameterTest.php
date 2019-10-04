<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Parameter;

final class PhoneNumberParameterTest extends TestCase
{
    public function testSetParameterOk()
    {
        $methodsParameters = ['Expe_Tel1' => null, 'Expe_Pays' => null];
        $regexPatterns = ['Expe_Tel1' => null, 'Expe_Pays' => null];
        $parameters = [
            'Enseigne' => "BDTEST13",
            'PrivateKey' => "PrivateK",
            'Expe_Pays' => "FR",
            'Expe_Tel1' => "+33123456789",
        ];
        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $settedParameters = $parameter->setParameters($parameters);
        $this->assertEmpty($parameter->getErrors());
    }

    public function testSetParameterKo()
    {
        $methodsParameters = ['Expe_Tel1' => null, 'Expe_Pays' => null];
        $regexPatterns = ['Expe_Tel1' => null, 'Expe_Pays' => null];
        $parameters = [
            'Enseigne' => "BDTEST13",
            'PrivateKey' => "PrivateK",
            'Expe_Pays' => "FR",
            'Expe_Tel1' => "+22123456789",
        ];
        $parameter = new Parameter($methodsParameters, $regexPatterns);
        $settedParameters = $parameter->setParameters($parameters);
        $this->assertNotEmpty($parameter->getErrors());
    }
}
