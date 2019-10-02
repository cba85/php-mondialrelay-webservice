<?php

namespace MondialRelay\Methods;

use MondialRelay\Contracts\MethodInterface;

/**
 * Stat label
 */
class StatLabel extends Method implements MethodInterface
{
    /**
     * Method name
     *
     * @return string
     */
    public function name()
    {
        return "WSI2_STAT_Label";
    }
}
