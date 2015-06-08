<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WpComments
 */
class WpComments
{
    /**
     * @var integer
     */
    private $commentId;

    /**
     * @var integer
     */
    private $commentPostId;

    /**
     * @var string
     */
    private $commentAuthor;

    /**
     * @var string
     */
    private $commentAuthorEmail;

    /**
     * @var string
     */
    private $commentAuthorUrl;

    /**
     * @var string
     */
    private $commentAuthorIp;

    /**
     * @var \DateTime
     */
    private $commentDate;

    /**
     * @var \DateTime
     */
    private $commentDateGmt;

    /**
     * @var string
     */
    private $commentContent;

    /**
     * @var integer
     */
    private $commentKarma;

    /**
     * @var string
     */
    private $commentApproved;

    /**
     * @var string
     */
    private $commentAgent;

    /**
     * @var string
     */
    private $commentType;

    /**
     * @var integer
     */
    private $commentParent;

    /**
     * @var integer
     */
    private $userId;


    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set commentPostId
     *
     * @param integer $commentPostId
     * @return WpComments
     */
    public function setCommentPostId($commentPostId)
    {
        $this->commentPostId = $commentPostId;
    
        return $this;
    }

    /**
     * Get commentPostId
     *
     * @return integer 
     */
    public function getCommentPostId()
    {
        return $this->commentPostId;
    }

    /**
     * Set commentAuthor
     *
     * @param string $commentAuthor
     * @return WpComments
     */
    public function setCommentAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;
    
        return $this;
    }

    /**
     * Get commentAuthor
     *
     * @return string 
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }

    /**
     * Set commentAuthorEmail
     *
     * @param string $commentAuthorEmail
     * @return WpComments
     */
    public function setCommentAuthorEmail($commentAuthorEmail)
    {
        $this->commentAuthorEmail = $commentAuthorEmail;
    
        return $this;
    }

    /**
     * Get commentAuthorEmail
     *
     * @return string 
     */
    public function getCommentAuthorEmail()
    {
        return $this->commentAuthorEmail;
    }

    /**
     * Set commentAuthorUrl
     *
     * @param string $commentAuthorUrl
     * @return WpComments
     */
    public function setCommentAuthorUrl($commentAuthorUrl)
    {
        $this->commentAuthorUrl = $commentAuthorUrl;
    
        return $this;
    }

    /**
     * Get commentAuthorUrl
     *
     * @return string 
     */
    public function getCommentAuthorUrl()
    {
        return $this->commentAuthorUrl;
    }

    /**
     * Set commentAuthorIp
     *
     * @param string $commentAuthorIp
     * @return WpComments
     */
    public function setCommentAuthorIp($commentAuthorIp)
    {
        $this->commentAuthorIp = $commentAuthorIp;
    
        return $this;
    }

    /**
     * Get commentAuthorIp
     *
     * @return string 
     */
    public function getCommentAuthorIp()
    {
        return $this->commentAuthorIp;
    }

    /**
     * Set commentDate
     *
     * @param \DateTime $commentDate
     * @return WpComments
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    
        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime 
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set commentDateGmt
     *
     * @param \DateTime $commentDateGmt
     * @return WpComments
     */
    public function setCommentDateGmt($commentDateGmt)
    {
        $this->commentDateGmt = $commentDateGmt;
    
        return $this;
    }

    /**
     * Get commentDateGmt
     *
     * @return \DateTime 
     */
    public function getCommentDateGmt()
    {
        return $this->commentDateGmt;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     * @return WpComments
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    
        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string 
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * Set commentKarma
     *
     * @param integer $commentKarma
     * @return WpComments
     */
    public function setCommentKarma($commentKarma)
    {
        $this->commentKarma = $commentKarma;
    
        return $this;
    }

    /**
     * Get commentKarma
     *
     * @return integer 
     */
    public function getCommentKarma()
    {
        return $this->commentKarma;
    }

    /**
     * Set commentApproved
     *
     * @param string $commentApproved
     * @return WpComments
     */
    public function setCommentApproved($commentApproved)
    {
        $this->commentApproved = $commentApproved;
    
        return $this;
    }

    /**
     * Get commentApproved
     *
     * @return string 
     */
    public function getCommentApproved()
    {
        return $this->commentApproved;
    }

    /**
     * Set commentAgent
     *
     * @param string $commentAgent
     * @return WpComments
     */
    public function setCommentAgent($commentAgent)
    {
        $this->commentAgent = $commentAgent;
    
        return $this;
    }

    /**
     * Get commentAgent
     *
     * @return string 
     */
    public function getCommentAgent()
    {
        return $this->commentAgent;
    }

    /**
     * Set commentType
     *
     * @param string $commentType
     * @return WpComments
     */
    public function setCommentType($commentType)
    {
        $this->commentType = $commentType;
    
        return $this;
    }

    /**
     * Get commentType
     *
     * @return string 
     */
    public function getCommentType()
    {
        return $this->commentType;
    }

    /**
     * Set commentParent
     *
     * @param integer $commentParent
     * @return WpComments
     */
    public function setCommentParent($commentParent)
    {
        $this->commentParent = $commentParent;
    
        return $this;
    }

    /**
     * Get commentParent
     *
     * @return integer 
     */
    public function getCommentParent()
    {
        return $this->commentParent;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return WpComments
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
