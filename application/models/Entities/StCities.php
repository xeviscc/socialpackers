<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StCities
 */
class StCities
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Entities\StCountries
     */
    private $country;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return StCities
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

    /**
     * Set country
     *
     * @param \Entities\StCountries $country
     * @return StCities
     */
    public function setCountry(\Entities\StCountries $country = null)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \Entities\StCountries 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
