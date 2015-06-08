<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WpTermRelationships
 */
class WpTermRelationships
{
    /**
     * @var integer
     */
    private $objectId;

    /**
     * @var integer
     */
    private $termTaxonomyId;

    /**
     * @var integer
     */
    private $termOrder;


    /**
     * Set objectId
     *
     * @param integer $objectId
     * @return WpTermRelationships
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set termTaxonomyId
     *
     * @param integer $termTaxonomyId
     * @return WpTermRelationships
     */
    public function setTermTaxonomyId($termTaxonomyId)
    {
        $this->termTaxonomyId = $termTaxonomyId;
    
        return $this;
    }

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
     * Set termOrder
     *
     * @param integer $termOrder
     * @return WpTermRelationships
     */
    public function setTermOrder($termOrder)
    {
        $this->termOrder = $termOrder;
    
        return $this;
    }

    /**
     * Get termOrder
     *
     * @return integer 
     */
    public function getTermOrder()
    {
        return $this->termOrder;
    }
}
