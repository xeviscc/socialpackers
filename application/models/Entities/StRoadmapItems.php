<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StRoadmapItems
 */
class StRoadmapItems
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var integer
     */
    private $budget;

    /**
     * @var \Entities\StRoadmaps
     */
    private $idRoadmap;

    /**
     * @var \Entities\StCountries
     */
    private $countryCode;


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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return StRoadmapItems
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return StRoadmapItems
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     * @return StRoadmapItems
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    
        return $this;
    }

    /**
     * Get budget
     *
     * @return integer 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set idRoadmap
     *
     * @param \Entities\StRoadmaps $idRoadmap
     * @return StRoadmapItems
     */
    public function setIdRoadmap(\Entities\StRoadmaps $idRoadmap = null)
    {
        $this->idRoadmap = $idRoadmap;
    
        return $this;
    }

    /**
     * Get idRoadmap
     *
     * @return \Entities\StRoadmaps 
     */
    public function getIdRoadmap()
    {
        return $this->idRoadmap;
    }

    /**
     * Set countryCode
     *
     * @param \Entities\StCountries $countryCode
     * @return StRoadmapItems
     */
    public function setCountryCode(\Entities\StCountries $countryCode = null)
    {
        $this->countryCode = $countryCode;
    
        return $this;
    }

    /**
     * Get countryCode
     *
     * @return \Entities\StCountries 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
}
