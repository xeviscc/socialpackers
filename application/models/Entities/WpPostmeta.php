<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WpPostmeta
 */
class WpPostmeta
{
    /**
     * @var integer
     */
    private $metaId;

    /**
     * @var integer
     */
    private $postId;

    /**
     * @var string
     */
    private $metaKey;

    /**
     * @var string
     */
    private $metaValue;


    /**
     * Get metaId
     *
     * @return integer 
     */
    public function getMetaId()
    {
        return $this->metaId;
    }

    /**
     * Set postId
     *
     * @param integer $postId
     * @return WpPostmeta
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    
        return $this;
    }

    /**
     * Get postId
     *
     * @return integer 
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     * @return WpPostmeta
     */
    public function setMetaKey($metaKey)
    {
        $this->metaKey = $metaKey;
    
        return $this;
    }

    /**
     * Get metaKey
     *
     * @return string 
     */
    public function getMetaKey()
    {
        return $this->metaKey;
    }

    /**
     * Set metaValue
     *
     * @param string $metaValue
     * @return WpPostmeta
     */
    public function setMetaValue($metaValue)
    {
        $this->metaValue = $metaValue;
    
        return $this;
    }

    /**
     * Get metaValue
     *
     * @return string 
     */
    public function getMetaValue()
    {
        return $this->metaValue;
    }
}
