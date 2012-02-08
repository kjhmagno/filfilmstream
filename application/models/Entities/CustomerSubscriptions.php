<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\CustomerSubscriptions
 */
class CustomerSubscriptions
{
    /**
     * @var smallint $id
     */
    private $id;

    /**
     * @var date $startDate
     */
    private $startDate;

    /**
     * @var date $endDate
     */
    private $endDate;

    /**
     * @var string $status
     */
    private $status;

    /**
     * @var Entities\Customers
     */
    private $customers;

    /**
     * @var Entities\Subscriptions
     */
    private $subscriptions;

    /**
     * @var Entities\Movies
     */
    private $movies;

    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set startDate
     *
     * @param date $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Get startDate
     *
     * @return date 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param date $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Get endDate
     *
     * @return date 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set customers
     *
     * @param Entities\Customers $customers
     */
    public function setCustomers(\Entities\Customers $customers)
    {
        $this->customers = $customers;
    }

    /**
     * Get customers
     *
     * @return Entities\Customers 
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Set subscriptions
     *
     * @param Entities\Subscriptions $subscriptions
     */
    public function setSubscriptions(\Entities\Subscriptions $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * Get subscriptions
     *
     * @return Entities\Subscriptions 
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Add movies
     *
     * @param Entities\Movies $movies
     */
    public function addMovies(\Entities\Movies $movies)
    {
        $this->movies[] = $movies;
    }

    /**
     * Get movies
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }
}