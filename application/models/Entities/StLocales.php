<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StLocales
 */
class StLocales
{
    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $name;


    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return StLocales
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
