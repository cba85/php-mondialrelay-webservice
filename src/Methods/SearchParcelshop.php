<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;
use MondialRelay\Method;

/**
 * Search Parcelshop
 */
class SearchParcelshop extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name()
    {
        return "WSI4_PointRelais_Recherche";
    }

    /**
     * Required parameters
     *
     * @return array
     */
    public function requiredParameters(): array
    {
        return [
            'Pays',
            'NombreResultats',
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
            'Pays' => "/^[A-Za-z]{2}$/",
            'NumPointRelais' => "/^[0-9]{6}$/",
            'Ville' => "/^[A-Za-z_\-']{2,25}$/",
            'CP' => null,
            'Latitude' => "/^-?[0-9]{1,2}\.[0-9]{7}$/",
            'Longitude' =>  "/^-?[0-9]{1,2}\.[0-9]{7}$/",
            'Taille' => "/^(XS|S|M|L|XL|XXL|3XL)$/",
            'Poids' => "/^[0-9]{1,6}$/",
            'Action' => "/^(REL|24R|24L|24X|DRI)$/",
            'DelaiEnvoi' => "/^-?[0-9]{2}$/",
            'RayonRecherche' => "/^[0-9]{1,4}$/",
            'TypeActivite' => "/^(\d{3},|\d{3})*$/",
            'NACE' => null,
            'NombreResultats' => "/[0-3][0-9]/",
        ];
    }
}
