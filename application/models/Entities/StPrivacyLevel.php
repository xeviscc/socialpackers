<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StPrivacyLevel
 */
class StPrivacyLevel
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $privacyLevel;


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
     * Set privacyLevel
     *
     * @param string $privacyLevel
     * @return StPrivacyLevel
     */
    public function setPrivacyLevel($privacyLevel)
    {
        $this->privacyLevel = $privacyLevel;
    
        return $this;
    }

    /**
     * Get privacyLevel
     *
     * @return string 
     */
    public function getPrivacyLevel()
    {
        return $this->privacyLevel;
    }
}
