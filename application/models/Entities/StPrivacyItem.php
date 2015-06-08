<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StPrivacyItem
 */
class StPrivacyItem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Entities\StItems
     */
    private $item;

    /**
     * @var \Entities\StPrivacyLevel
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
     * Set item
     *
     * @param \Entities\StItems $item
     * @return StPrivacyItem
     */
    public function setItem(\Entities\StItems $item = null)
    {
        $this->item = $item;
    
        return $this;
    }

    /**
     * Get item
     *
     * @return \Entities\StItems 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set privacyLevel
     *
     * @param \Entities\StPrivacyLevel $privacyLevel
     * @return StPrivacyItem
     */
    public function setPrivacyLevel(\Entities\StPrivacyLevel $privacyLevel = null)
    {
        $this->privacyLevel = $privacyLevel;
    
        return $this;
    }

    /**
     * Get privacyLevel
     *
     * @return \Entities\StPrivacyLevel 
     */
    public function getPrivacyLevel()
    {
        return $this->privacyLevel;
    }
}
