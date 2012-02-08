<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\MoviesProfile
 */
class MoviesProfile
{
    /**
     * @var smallint $id
     */
    private $id;

    /**
     * @var string $director
     */
    private $director;

    /**
     * @var string $producer
     */
    private $producer;

    /**
     * @var string $actors
     */
    private $actors;

    /**
     * @var date $releaseDate
     */
    private $releaseDate;

    /**
     * @var text $summary
     */
    private $summary;

    /**
     * @var Entities\Genres
     */
    private $genres;

    public function __construct()
    {
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set director
     *
     * @param string $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set producer
     *
     * @param string $producer
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;
    }

    /**
     * Get producer
     *
     * @return string 
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set actors
     *
     * @param string $actors
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
    }

    /**
     * Get actors
     *
     * @return string 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set releaseDate
     *
     * @param date $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * Get releaseDate
     *
     * @return date 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set summary
     *
     * @param text $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * Get summary
     *
     * @return text 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Add genres
     *
     * @param Entities\Genres $genres
     */
    public function addGenres(\Entities\Genres $genres)
    {
        $this->genres[] = $genres;
    }

    /**
     * Get genres
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGenres()
    {
        return $this->genres;
    }
}