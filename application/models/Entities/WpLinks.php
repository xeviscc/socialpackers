<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WpLinks
 */
class WpLinks
{
    /**
     * @var integer
     */
    private $linkId;

    /**
     * @var string
     */
    private $linkUrl;

    /**
     * @var string
     */
    private $linkName;

    /**
     * @var string
     */
    private $linkImage;

    /**
     * @var string
     */
    private $linkTarget;

    /**
     * @var string
     */
    private $linkDescription;

    /**
     * @var string
     */
    private $linkVisible;

    /**
     * @var integer
     */
    private $linkOwner;

    /**
     * @var integer
     */
    private $linkRating;

    /**
     * @var \DateTime
     */
    private $linkUpdated;

    /**
     * @var string
     */
    private $linkRel;

    /**
     * @var string
     */
    private $linkNotes;

    /**
     * @var string
     */
    private $linkRss;


    /**
     * Get linkId
     *
     * @return integer 
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * Set linkUrl
     *
     * @param string $linkUrl
     * @return WpLinks
     */
    public function setLinkUrl($linkUrl)
    {
        $this->linkUrl = $linkUrl;
    
        return $this;
    }

    /**
     * Get linkUrl
     *
     * @return string 
     */
    public function getLinkUrl()
    {
        return $this->linkUrl;
    }

    /**
     * Set linkName
     *
     * @param string $linkName
     * @return WpLinks
     */
    public function setLinkName($linkName)
    {
        $this->linkName = $linkName;
    
        return $this;
    }

    /**
     * Get linkName
     *
     * @return string 
     */
    public function getLinkName()
    {
        return $this->linkName;
    }

    /**
     * Set linkImage
     *
     * @param string $linkImage
     * @return WpLinks
     */
    public function setLinkImage($linkImage)
    {
        $this->linkImage = $linkImage;
    
        return $this;
    }

    /**
     * Get linkImage
     *
     * @return string 
     */
    public function getLinkImage()
    {
        return $this->linkImage;
    }

    /**
     * Set linkTarget
     *
     * @param string $linkTarget
     * @return WpLinks
     */
    public function setLinkTarget($linkTarget)
    {
        $this->linkTarget = $linkTarget;
    
        return $this;
    }

    /**
     * Get linkTarget
     *
     * @return string 
     */
    public function getLinkTarget()
    {
        return $this->linkTarget;
    }

    /**
     * Set linkDescription
     *
     * @param string $linkDescription
     * @return WpLinks
     */
    public function setLinkDescription($linkDescription)
    {
        $this->linkDescription = $linkDescription;
    
        return $this;
    }

    /**
     * Get linkDescription
     *
     * @return string 
     */
    public function getLinkDescription()
    {
        return $this->linkDescription;
    }

    /**
     * Set linkVisible
     *
     * @param string $linkVisible
     * @return WpLinks
     */
    public function setLinkVisible($linkVisible)
    {
        $this->linkVisible = $linkVisible;
    
        return $this;
    }

    /**
     * Get linkVisible
     *
     * @return string 
     */
    public function getLinkVisible()
    {
        return $this->linkVisible;
    }

    /**
     * Set linkOwner
     *
     * @param integer $linkOwner
     * @return WpLinks
     */
    public function setLinkOwner($linkOwner)
    {
        $this->linkOwner = $linkOwner;
    
        return $this;
    }

    /**
     * Get linkOwner
     *
     * @return integer 
     */
    public function getLinkOwner()
    {
        return $this->linkOwner;
    }

    /**
     * Set linkRating
     *
     * @param integer $linkRating
     * @return WpLinks
     */
    public function setLinkRating($linkRating)
    {
        $this->linkRating = $linkRating;
    
        return $this;
    }

    /**
     * Get linkRating
     *
     * @return integer 
     */
    public function getLinkRating()
    {
        return $this->linkRating;
    }

    /**
     * Set linkUpdated
     *
     * @param \DateTime $linkUpdated
     * @return WpLinks
     */
    public function setLinkUpdated($linkUpdated)
    {
        $this->linkUpdated = $linkUpdated;
    
        return $this;
    }

    /**
     * Get linkUpdated
     *
     * @return \DateTime 
     */
    public function getLinkUpdated()
    {
        return $this->linkUpdated;
    }

    /**
     * Set linkRel
     *
     * @param string $linkRel
     * @return WpLinks
     */
    public function setLinkRel($linkRel)
    {
        $this->linkRel = $linkRel;
    
        return $this;
    }

    /**
     * Get linkRel
     *
     * @return string 
     */
    public function getLinkRel()
    {
        return $this->linkRel;
    }

    /**
     * Set linkNotes
     *
     * @param string $linkNotes
     * @return WpLinks
     */
    public function setLinkNotes($linkNotes)
    {
        $this->linkNotes = $linkNotes;
    
        return $this;
    }

    /**
     * Get linkNotes
     *
     * @return string 
     */
    public function getLinkNotes()
    {
        return $this->linkNotes;
    }

    /**
     * Set linkRss
     *
     * @param string $linkRss
     * @return WpLinks
     */
    public function setLinkRss($linkRss)
    {
        $this->linkRss = $linkRss;
    
        return $this;
    }

    /**
     * Get linkRss
     *
     * @return string 
     */
    public function getLinkRss()
    {
        return $this->linkRss;
    }
}
