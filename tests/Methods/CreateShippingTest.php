<?php

use PHPUnit\Framework\TestCase;
use MondialRelay\Webservice;

final class CreateShippingTest extends TestCase
{
    public function testCreateShipping()
    {
        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'ModeCol' => 'REL',
            'ModeLiv' => '24R',
            'Expe_Langage' => 'FR',
            'Expe_Ad1' => 'The sender',
            'Expe_Ad3' => "Sender street",
            'Expe_Ville' => "Paris",
            'Expe_CP' => "75001",
            'Expe_Pays' => "FR",
            'Expe_Tel1' => "+33612345678",
            'Dest_Langage' => 'FR',
            'Dest_Ad1' => "The receiver",
            'Dest_Ad3' => "Receiver street",
            'Dest_Ville' => "Toulouse",
            'Dest_CP' => "31000",
            'Dest_Pays' => "FR",
            'Dest_Tel1' => "+33698765432",
            'Poids' => "400",
            'NbColis' => "1",
            'COL_Rel_Pays' => "FR",
            'COL_Rel' => "007201",
            'CRT_Valeur' => "20",
            'LIV_Rel_Pays' => "FR",
            'LIV_Rel' => "007201",
        ];

        $createShipping = $mondialrelay->createShipping($parameters)->getResults();

        $this->assertSame('0', $createShipping->STAT);
    }

    public function testCreateShippingWithoutRequiredParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'ModeCol' => 'REL',
            'ModeLiv' => '24R',
            'Expe_Langage' => 'FR',
            'Expe_Ad1' => 'The sender',
            'Expe_Ad3' => "Sender street",
            'Expe_Ville' => "Paris",
            'Expe_CP' => "75001",
            'Expe_Pays' => "FR",
            'Expe_Tel1' => "+33612345678",
            'Dest_Langage' => 'FR',
            'Dest_Ad1' => "The receiver",
            'Dest_Ad3' => "Receiver street",
            'Dest_Ville' => "Toulouse",
            'Dest_CP' => "31000",
            'Dest_Pays' => "FR",
        ];

        $mondialrelay->createShipping($parameters)->getResults();
    }

    public function testCreateShippingUsingBadParameters()
    {
        $this->expectException(MondialRelay\Exceptions\ParameterException::class);

        $mondialrelay = new Webservice('BDTEST13', 'PrivateK');

        $parameters = [
            'ModeCol' => 'LOL',
            'ModeLiv' => 'LOL',
            'Expe_Langage' => 'FR',
            'Expe_Ad1' => 'The sender',
            'Expe_Ad3' => "Sender street",
            'Expe_Ville' => "Paris",
            'Expe_CP' => "75001",
            'Expe_Pays' => "FR",
            'Expe_Tel1' => "+33612345678",
            'Dest_Langage' => 'FR',
            'Dest_Ad1' => "The receiver",
            'Dest_Ad3' => "Receiver street",
            'Dest_Ville' => "Toulouse",
            'Dest_CP' => "31000",
            'Dest_Pays' => "FR",
            'Dest_Tel1' => "+33698765432",
            'Poids' => "400",
            'NbColis' => "1",
            'COL_Rel_Pays' => "FR",
            'COL_Rel' => "007201",
            'CRT_Valeur' => "20",
            'LIV_Rel_Pays' => "FR",
            'LIV_Rel' => "007201",
        ];

        $mondialrelay->createShipping($parameters)->getResults();
    }
}
