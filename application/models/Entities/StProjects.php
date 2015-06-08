<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StProjects
 */
class StProjects
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
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $published;

    /**
     * @var boolean
     */
    private $validated;

    /**
     * @var \Entities\StUsers
     */
    private $organizer;


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
     * @return StProjects
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
     * Set countryCode
     *
     * @param string $countryCode
     * @return StProjects
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    
        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return StProjects
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return StProjects
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return StProjects
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set validated
     *
     * @param boolean $validated
     * @return StProjects
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;
    
        return $this;
    }

    /**
     * Get validated
     *
     * @return boolean 
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Set organizer
     *
     * @param \Entities\StUsers $organizer
     * @return StProjects
     */
    public function setOrganizer(\Entities\StUsers $organizer = null)
    {
        $this->organizer = $organizer;
    
        return $this;
    }

    /**
     * Get organizer
     *
     * @return \Entities\StUsers 
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }
}
