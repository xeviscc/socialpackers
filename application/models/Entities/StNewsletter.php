<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StNewsletter
 */
class StNewsletter
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $habilitated;


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
     * Set email
     *
     * @param string $email
     * @return StNewsletter
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set habilitated
     *
     * @param boolean $habilitated
     * @return StNewsletter
     */
    public function setHabilitated($habilitated)
    {
        $this->habilitated = $habilitated;
    
        return $this;
    }

    /**
     * Get habilitated
     *
     * @return boolean 
     */
    public function getHabilitated()
    {
        return $this->habilitated;
    }
}
