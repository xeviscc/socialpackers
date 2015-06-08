<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WpOptions
 */
class WpOptions
{
    /**
     * @var integer
     */
    private $optionId;

    /**
     * @var string
     */
    private $optionName;

    /**
     * @var string
     */
    private $optionValue;

    /**
     * @var string
     */
    private $autoload;


    /**
     * Get optionId
     *
     * @return integer 
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Set optionName
     *
     * @param string $optionName
     * @return WpOptions
     */
    public function setOptionName($optionName)
    {
        $this->optionName = $optionName;
    
        return $this;
    }

    /**
     * Get optionName
     *
     * @return string 
     */
    public function getOptionName()
    {
        return $this->optionName;
    }

    /**
     * Set optionValue
     *
     * @param string $optionValue
     * @return WpOptions
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;
    
        return $this;
    }

    /**
     * Get optionValue
     *
     * @return string 
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set autoload
     *
     * @param string $autoload
     * @return WpOptions
     */
    public function setAutoload($autoload)
    {
        $this->autoload = $autoload;
    
        return $this;
    }

    /**
     * Get autoload
     *
     * @return string 
     */
    public function getAutoload()
    {
        return $this->autoload;
    }
}
