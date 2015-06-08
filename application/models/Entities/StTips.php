<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StTips
 */
class StTips
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tip;

    /**
     * @var \DateTime
     */
    private $publicationDate;

    /**
     * @var string
     */
    private $categories;

    /**
     * @var \Entities\StCountries
     */
    private $countryCode;

    /**
     * @var \Entities\StUsers
     */
    private $idUser;


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
     * Set tip
     *
     * @param string $tip
     * @return StTips
     */
    public function setTip($tip)
    {
        $this->tip = $tip;
    
        return $this;
    }

    /**
     * Get tip
     *
     * @return string 
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return StTips
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    
        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set categories
     *
     * @param string $categories
     * @return StTips
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    
        return $this;
    }

    /**
     * Get categories
     *
     * @return string 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set countryCode
     *
     * @param \Entities\StCountries $countryCode
     * @return StTips
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

    /**
     * Set idUser
     *
     * @param \Entities\StUsers $idUser
     * @return StTips
     */
    public function setIdUser(\Entities\StUsers $idUser = null)
    {
        $this->idUser = $idUser;
    
        return $this;
    }

    /**
     * Get idUser
     *
     * @return \Entities\StUsers 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
