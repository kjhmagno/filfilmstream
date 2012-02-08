<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Genres
 */
class Genres
{
    /**
     * @var smallint $id
     */
    private $id;

    /**
     * @var string $type
     */
    private $type;


    /**
     * Get id
     *
     * @return smallint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}