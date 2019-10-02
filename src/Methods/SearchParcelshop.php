<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;

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
}
