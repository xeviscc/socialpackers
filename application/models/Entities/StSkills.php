<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StSkills
 */
class StSkills
{
    /**
     * @var string
     */
    private $skill;

    /**
     * @var string
     */
    private $description;


    /**
     * Get skill
     *
     * @return string 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return StSkills
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
