<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WpTermTaxonomy
 */
class WpTermTaxonomy
{
    /**
     * @var integer
     */
    private $termTaxonomyId;

    /**
     * @var integer
     */
    private $termId;

    /**
     * @var string
     */
    private $taxonomy;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $parent;

    /**
     * @var integer
     */
    private $count;


    /**
     * Get termTaxonomyId
     *
     * @return integer 
     */
    public function getTermTaxonomyId()
    {
        return $this->termTaxonomyId;
    }

    /**
     * Set termId
     *
     * @param integer $termId
     * @return WpTermTaxonomy
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;
    
        return $this;
    }

    /**
     * Get termId
     *
     * @return integer 
     */
    public function getTermId()
    {
        return $this->termId;
    }

    /**
     * Set taxonomy
     *
     * @param string $taxonomy
     * @return WpTermTaxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    
        return $this;
    }

    /**
     * Get taxonomy
     *
     * @return string 
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return WpTermTaxonomy
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
     * Set parent
     *
     * @param integer $parent
     * @return WpTermTaxonomy
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return WpTermTaxonomy
     */
    public function setCount($count)
    {
        $this->count = $count;
    
        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }
}
