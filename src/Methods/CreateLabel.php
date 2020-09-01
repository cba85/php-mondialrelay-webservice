<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Create label
 */
class CreateLabel extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name()
    {
        return "WSI2_CreationEtiquette";
    }

    /**
     * Required parameters
     *
     * @return array
     */
    public function requiredParameters(): array
    {
        return [
            'ModeCol',
            'ModeLiv',
            'Expe_Langage',
            'Expe_Ad1',
            'Expe_Ad3',
            'Expe_Ville',
            'Expe_CP',
            'Expe_Pays',
            'Expe_Tel1',
            'Dest_Langage',
            'Dest_Ad1',
            'Dest_Ad3',
            'Dest_Ville',
            'Dest_CP',
            'Dest_Pays',
            'Dest_Tel1',
            'Poids',
            'NbColis',
            'CRT_Valeur',
        ];
    }

    /**
     * Regex patterns
     *
     * @return array
     */
    public function regexPatterns()
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
