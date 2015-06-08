<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StItemTypes
 */
class StItemTypes
{
    /**
     * @var string
     */
    private $type;


    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
