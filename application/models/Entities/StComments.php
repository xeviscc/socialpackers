<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StComments
 */
class StComments
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idItem;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $approved;

    /**
     * @var \Entities\StUsers
     */
    private $idUser;

    /**
     * @var \Entities\StItemTypes
     */
    private $type;


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
     * Set idItem
     *
     * @param integer $idItem
     * @return StComments
     */
    public function setIdItem($idItem)
    {
        $this->idItem = $idItem;
    
        return $this;
    }

    /**
     * Get idItem
     *
     * @return integer 
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return StComments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return StComments
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return StComments
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    
        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set idUser
     *
     * @param \Entities\StUsers $idUser
     * @return StComments
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

    /**
     * Set type
     *
     * @param \Entities\StItemTypes $type
     * @return StComments
     */
    public function setType(\Entities\StItemTypes $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \Entities\StItemTypes 
     */
    public function getType()
    {
        return $this->type;
    }
}
