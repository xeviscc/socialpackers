<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StFriends
 */
class StFriends
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $reqDate;

    /**
     * @var boolean
     */
    private $accepted;

    /**
     * @var \Entities\StUsers
     */
    private $toUser;

    /**
     * @var \Entities\StUsers
     */
    private $fromUser;


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
     * Set reqDate
     *
     * @param \DateTime $reqDate
     * @return StFriends
     */
    public function setReqDate($reqDate)
    {
        $this->reqDate = $reqDate;
    
        return $this;
    }

    /**
     * Get reqDate
     *
     * @return \DateTime 
     */
    public function getReqDate()
    {
        return $this->reqDate;
    }

    /**
     * Set accepted
     *
     * @param boolean $accepted
     * @return StFriends
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;
    
        return $this;
    }

    /**
     * Get accepted
     *
     * @return boolean 
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * Set toUser
     *
     * @param \Entities\StUsers $toUser
     * @return StFriends
     */
    public function setToUser(\Entities\StUsers $toUser = null)
    {
        $this->toUser = $toUser;
    
        return $this;
    }

    /**
     * Get toUser
     *
     * @return \Entities\StUsers 
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * Set fromUser
     *
     * @param \Entities\StUsers $fromUser
     * @return StFriends
     */
    public function setFromUser(\Entities\StUsers $fromUser = null)
    {
        $this->fromUser = $fromUser;
    
        return $this;
    }

    /**
     * Get fromUser
     *
     * @return \Entities\StUsers 
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }
}
