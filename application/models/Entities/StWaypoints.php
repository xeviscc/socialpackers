<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StWaypoints
 */
class StWaypoints
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var \DateTime
     */
    private $checkinDate;

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
     * Set latitude
     *
     * @param float $latitude
     * @return StWaypoints
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return StWaypoints
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set checkinDate
     *
     * @param \DateTime $checkinDate
     * @return StWaypoints
     */
    public function setCheckinDate($checkinDate)
    {
        $this->checkinDate = $checkinDate;
    
        return $this;
    }

    /**
     * Get checkinDate
     *
     * @return \DateTime 
     */
    public function getCheckinDate()
    {
        return $this->checkinDate;
    }

    /**
     * Set idUser
     *
     * @param \Entities\StUsers $idUser
     * @return StWaypoints
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
