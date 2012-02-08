<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Subscriptions
 */
class Subscriptions
{
    /**
     * @var smallint $id
     */
    private $id;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var decimal $price
     */
    private $price;


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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }
}