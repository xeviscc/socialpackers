<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StUserProject
 */
class StUserProject
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $approved;

    /**
     * @var \Entities\StUsers
     */
    private $idUser;

    /**
     * @var \Entities\StProjects
     */
    private $idProject;

    /**
     * @var \Entities\StTasks
     */
    private $idTask;


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
     * Set approved
     *
     * @param boolean $approved
     * @return StUserProject
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
     * @return StUserProject
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
     * Set idProject
     *
     * @param \Entities\StProjects $idProject
     * @return StUserProject
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

    /**
     * Set idTask
     *
     * @param \Entities\StTasks $idTask
     * @return StUserProject
     */
    public function setIdTask(\Entities\StTasks $idTask = null)
    {
        $this->idTask = $idTask;
    
        return $this;
    }

    /**
     * Get idTask
     *
     * @return \Entities\StTasks 
     */
    public function getIdTask()
    {
        return $this->idTask;
    }
}
