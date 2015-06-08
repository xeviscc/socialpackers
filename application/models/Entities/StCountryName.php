<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StCountryName
 */
class StCountryName
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
    private $code;

    /**
     * @var \Entities\StLocales
     */
    private $locale;


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
     * @return StCountryName
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
     * Set code
     *
     * @param \Entities\StCountries $code
     * @return StCountryName
     */
    public function setCode(\Entities\StCountries $code = null)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return \Entities\StCountries 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set locale
     *
     * @param \Entities\StLocales $locale
     * @return StCountryName
     */
    public function setLocale(\Entities\StLocales $locale = null)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return \Entities\StLocales 
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
