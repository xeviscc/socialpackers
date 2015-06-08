<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StContactForm
 */
class StContactForm
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
    private $email;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \DateTime
     */
    private $sendDate;

    /**
     * @var boolean
     */
    private $proceced;


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
     * @return StContactForm
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
     * Set email
     *
     * @param string $email
     * @return StContactForm
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
     * Set comment
     *
     * @param string $comment
     * @return StContactForm
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
     * Set sendDate
     *
     * @param \DateTime $sendDate
     * @return StContactForm
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;
    
        return $this;
    }

    /**
     * Get sendDate
     *
     * @return \DateTime 
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * Set proceced
     *
     * @param boolean $proceced
     * @return StContactForm
     */
    public function setProceced($proceced)
    {
        $this->proceced = $proceced;
    
        return $this;
    }

    /**
     * Get proceced
     *
     * @return boolean 
     */
    public function getProceced()
    {
        return $this->proceced;
    }
}
