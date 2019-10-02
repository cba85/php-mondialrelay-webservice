<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;

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
}