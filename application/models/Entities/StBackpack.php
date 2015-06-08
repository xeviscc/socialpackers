<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StBackpack
 */
class StBackpack
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Entities\StUsers
     */
    private $idUser;

    /**
     * @var \Entities\StTips
     */
    private $idTip;


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
     * Set idUser
     *
     * @param \Entities\StUsers $idUser
     * @return StBackpack
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
     * Set idTip
     *
     * @param \Entities\StTips $idTip
     * @return StBackpack
     */
    public function setIdTip(\Entities\StTips $idTip = null)
    {
        $this->idTip = $idTip;
    
        return $this;
    }

    /**
     * Get idTip
     *
     * @return \Entities\StTips 
     */
    public function getIdTip()
    {
        return $this->idTip;
    }
}
