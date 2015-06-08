<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StCountries
 */
class StCountries
{
    /**
     * @var string
     */
    private $code;


    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
}
