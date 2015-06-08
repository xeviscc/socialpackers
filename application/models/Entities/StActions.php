<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StActions
 */
class StActions
{
    /**
     * @var string
     */
    private $action;


    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }
}
