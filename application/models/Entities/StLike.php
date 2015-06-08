<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StLike
 */
class StLike
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Entities\StTips
     */
    private $idTip;

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
     * Set idTip
     *
     * @param \Entities\StTips $idTip
     * @return StLike
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

    /**
     * Set idUser
     *
     * @param \Entities\StUsers $idUser
     * @return StLike
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
