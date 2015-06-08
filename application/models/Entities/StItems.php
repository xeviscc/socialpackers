<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StItems
 */
class StItems
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idobject;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $action;

    /**
     * @var \Entities\StUsers
     */
    private $iduser;

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
     * Set idobject
     *
     * @param integer $idobject
     * @return StItems
     */
    public function setIdobject($idobject)
    {
        $this->idobject = $idobject;
    
        return $this;
    }

    /**
     * Get idobject
     *
     * @return integer 
     */
    public function getIdobject()
    {
        return $this->idobject;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return StItems
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
     * Set action
     *
     * @param string $action
     * @return StItems
     */
    public function setAction($action)
    {
        $this->action = $action;
    
        return $this;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set iduser
     *
     * @param \Entities\StUsers $iduser
     * @return StItems
     */
    public function setIduser(\Entities\StUsers $iduser = null)
    {
        $this->iduser = $iduser;
    
        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Entities\StUsers 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set type
     *
     * @param \Entities\StItemTypes $type
     * @return StItems
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
