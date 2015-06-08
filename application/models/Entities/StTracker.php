<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StTracker
 */
class StTracker
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $itemOrigin;

    /**
     * @var integer
     */
    private $itemDestiny;

    /**
     * @var \DateTime
     */
    private $trackDate;

    /**
     * @var integer
     */
    private $idAction;

    /**
     * @var boolean
     */
    private $isautomatic;


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
     * Set itemOrigin
     *
     * @param integer $itemOrigin
     * @return StTracker
     */
    public function setItemOrigin($itemOrigin)
    {
        $this->itemOrigin = $itemOrigin;
    
        return $this;
    }

    /**
     * Get itemOrigin
     *
     * @return integer 
     */
    public function getItemOrigin()
    {
        return $this->itemOrigin;
    }

    /**
     * Set itemDestiny
     *
     * @param integer $itemDestiny
     * @return StTracker
     */
    public function setItemDestiny($itemDestiny)
    {
        $this->itemDestiny = $itemDestiny;
    
        return $this;
    }

    /**
     * Get itemDestiny
     *
     * @return integer 
     */
    public function getItemDestiny()
    {
        return $this->itemDestiny;
    }

    /**
     * Set trackDate
     *
     * @param \DateTime $trackDate
     * @return StTracker
     */
    public function setTrackDate($trackDate)
    {
        $this->trackDate = $trackDate;
    
        return $this;
    }

    /**
     * Get trackDate
     *
     * @return \DateTime 
     */
    public function getTrackDate()
    {
        return $this->trackDate;
    }

    /**
     * Set idAction
     *
     * @param integer $idAction
     * @return StTracker
     */
    public function setIdAction($idAction)
    {
        $this->idAction = $idAction;
    
        return $this;
    }

    /**
     * Get idAction
     *
     * @return integer 
     */
    public function getIdAction()
    {
        return $this->idAction;
    }

    /**
     * Set isautomatic
     *
     * @param boolean $isautomatic
     * @return StTracker
     */
    public function setIsautomatic($isautomatic)
    {
        $this->isautomatic = $isautomatic;
    
        return $this;
    }

    /**
     * Get isautomatic
     *
     * @return boolean 
     */
    public function getIsautomatic()
    {
        return $this->isautomatic;
    }
}
