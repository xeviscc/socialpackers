<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StCategories
 */
class StCategories
{
    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $description;


    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return StCategories
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
}
