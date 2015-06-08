<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StRoadmaps
 */
class StRoadmaps
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $time;

    /**
     * @var integer
     */
    private $budget;

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
     * Set time
     *
     * @param integer $time
     * @return StRoadmaps
     */
    public function setTime($time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return integer 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     * @return StRoadmaps
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
     * Set idUser
     *
     * @param \Entities\StUsers $idUser
     * @return StRoadmaps
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
