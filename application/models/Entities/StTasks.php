<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StTasks
 */
class StTasks
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
    private $description;

    /**
     * @var string
     */
    private $requeriments;

    /**
     * @var string
     */
    private $reward;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $startSchedule;

    /**
     * @var string
     */
    private $endSchedule;

    /**
     * @var integer
     */
    private $numUsersNeeded;

    /**
     * @var string
     */
    private $skills;

    /**
     * @var \Entities\StProjects
     */
    private $idProject;


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
     * @return StTasks
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
     * Set description
     *
     * @param string $description
     * @return StTasks
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
     * Set requeriments
     *
     * @param string $requeriments
     * @return StTasks
     */
    public function setRequeriments($requeriments)
    {
        $this->requeriments = $requeriments;
    
        return $this;
    }

    /**
     * Get requeriments
     *
     * @return string 
     */
    public function getRequeriments()
    {
        return $this->requeriments;
    }

    /**
     * Set reward
     *
     * @param string $reward
     * @return StTasks
     */
    public function setReward($reward)
    {
        $this->reward = $reward;
    
        return $this;
    }

    /**
     * Get reward
     *
     * @return string 
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return StTasks
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
     * @return StTasks
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
     * Set startSchedule
     *
     * @param string $startSchedule
     * @return StTasks
     */
    public function setStartSchedule($startSchedule)
    {
        $this->startSchedule = $startSchedule;
    
        return $this;
    }

    /**
     * Get startSchedule
     *
     * @return string 
     */
    public function getStartSchedule()
    {
        return $this->startSchedule;
    }

    /**
     * Set endSchedule
     *
     * @param string $endSchedule
     * @return StTasks
     */
    public function setEndSchedule($endSchedule)
    {
        $this->endSchedule = $endSchedule;
    
        return $this;
    }

    /**
     * Get endSchedule
     *
     * @return string 
     */
    public function getEndSchedule()
    {
        return $this->endSchedule;
    }

    /**
     * Set numUsersNeeded
     *
     * @param integer $numUsersNeeded
     * @return StTasks
     */
    public function setNumUsersNeeded($numUsersNeeded)
    {
        $this->numUsersNeeded = $numUsersNeeded;
    
        return $this;
    }

    /**
     * Get numUsersNeeded
     *
     * @return integer 
     */
    public function getNumUsersNeeded()
    {
        return $this->numUsersNeeded;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return StTasks
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    
        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set idProject
     *
     * @param \Entities\StProjects $idProject
     * @return StTasks
     */
    public function setIdProject(\Entities\StProjects $idProject = null)
    {
        $this->idProject = $idProject;
    
        return $this;
    }

    /**
     * Get idProject
     *
     * @return \Entities\StProjects 
     */
    public function getIdProject()
    {
        return $this->idProject;
    }
}
