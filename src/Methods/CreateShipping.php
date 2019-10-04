<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Create Shipping
 */
class CreateShipping extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name() : string
    {
        return "WSI2_CreationExpedition";
    }

    /**
     * Method parameters
     *
     * @return array
     */
    public function methodParameters() : array
    {
        return [
            'Enseigne' => null,
            'ModeCol' => null,
            'ModeLiv' => null,
            'NDossier' => null,
            'NClient' => null,
            'Expe_Langage' => null,
            'Expe_Ad1' => null,
            'Expe_Ad2' => null,
            'Expe_Ad3' => null,
            'Expe_Ad4' => null,
            'Expe_Ville' => null,
            'Expe_CP' => null,
            'Expe_Pays' => null,
            'Expe_Tel1' => null,
            'Expe_Tel2' => null,
            'Expe_Mail' => null,
            'Dest_Langage' => null,
            'Dest_Ad1' => null,
            'Dest_Ad2' => null,
            'Dest_Ad3' => null,
            'Dest_Ad4' => null,
            'Dest_Ville' => null,
            'Dest_CP' => null,
            'Dest_Pays' => null,
            'Dest_Tel1' => null,
            'Dest_Tel2' => null,
            'Dest_Mail' => null,
            'Poids' => null,
            'Longueur' => null,
            'Taille' => null,
            'NbColis' => null,
            'CRT_Valeur' => null,
            'CRT_Devise' => null,
            'Exp_Valeur' => null,
            'Exp_Devise' => null,
            'COL_Rel_Pays' => null,
            'COL_Rel' => null,
            'LIV_Rel_Pays' => null,
            'LIV_Rel' => null,
            'TAvisage' => null,
            'TReprise' => null,
            'Montage' => null,
            'TRDV' => null,
            'Assurance' => null,
            'Instructions' => null
        ];
    }

    /**
     * Regex patterns
     *
     * @return array
     */
    public function regexPatterns() : array
    {
        return [
            'Enseigne' => "/^[0-9A-Z]{2}[0-9A-Z]{6}$/",
            'ModeCol' => "/^(CCC|CDR|CDS|REL)$/",
            'ModeLiv' => "/^(LCC|LD1|LDS|24R|24L|24X|ESP|DRI)$/",
            'NDossier' => "/^(|[0-9A-Z_ -]{0,15})$/",
            'NClient' => "/^(|[0-9A-Z]{0,9})$/",
            'Expe_Langage' => "/^[A-Z]{2}$/",
            'Expe_Ad1' => "/^[0-9A-Z_\-'., \/]{2,32}$/",
            'Expe_Ad2' => "/^[0-9A-Z_\-'., \/]{0,32}$/",
            'Expe_Ad3' => "/^[0-9A-Z_\-'., \/]{0,32}$/",
            'Expe_Ad4' => "/^[0-9A-Z_\-'., \/]{0,32}$/",
            'Expe_Ville' => null,
            'Expe_CP' => null,
            'Expe_Pays' => "/^[A-Z]{2}/",
            'Expe_Tel1' => null,
            'Expe_Tel2' => null,
            'Expe_Mail' => "/^[\w\-\.\@_]{7,70}$/",
            'Dest_Langage' => "/^[A-Z]{2}$/",
            'Dest_Ad1' => "/^[0-9A-Z_\-'., \/]{2,32}$/",
            'Dest_Ad2' => "/^[0-9A-Z_\-'., \/]{2,32}$/",
            'Dest_Ad3' => "/^[0-9A-Z_\-'., \/]{2,32}$/",
            'Dest_Ad4' => "/^[0-9A-Z_\-'., \/]{2,32}$/",
            'Dest_Ville' => null,
            'Dest_CP' => null,
            'Dest_Pays' => "/^[A-Z]{2}/",
            'Dest_Tel1' => null,
            'Dest_Tel2' => null,
            'Dest_Mail' => "/^[\w\-\.\@_]{7,70}$/",
            'Poids' => "/^[0-9]{1,6}$/",
            'Longueur' => "/^[0-9]{0,3}$/",
            'Taille' => "/^(XS|S|M|L|XL|XXL|3XL)$/",
            'NbColis' => "/^[0-9]{1,2}$/",
            'CRT_Valeur' => "/^[0-9]{1,7}$/",
            'CRT_Devise' => "/^(|EUR)$/",
            'Exp_Valeur' => "/^[0-9]{0,7}$/",
            'Exp_Devise' => "/^(|EUR)$/",
            'COL_Rel_Pays' => "/^[A-Z]{2}$/",
            'COL_Rel' => "/^(|[0-9]{6})$/",
            'LIV_Rel_Pays' =>  "/^[A-Z]{2}/",
            'LIV_Rel' => "/^(|[0-9]{6})$/",
            'TAvisage' => "/^(|O|N)$/",
            'TReprise' => "/^(|O|N)$/",
            'Montage' => "/^(|[0-9]{1,3})$/",
            'TRDV' => "/^(|O|N)$/",
            'Assurance' => "/^(|[0-9A-Z]{1})$/",
            'Instructions' => "/^[0-9A-Z_\-'., \/]{0,31}/"
        ];
    }
}
