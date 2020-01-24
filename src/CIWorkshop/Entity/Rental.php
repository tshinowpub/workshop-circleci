<?php

declare(strict_types=1);

namespace CIWorkshop\Entity;

/**
 * Class Rental
 *
 * @package CIWorkshop\Entity
 */
class Rental
{
    /**
     * @var Movie
     */
    private Movie $movie;

    private int $dayRented;

    /**
     * @param Movie $movie
     * @param int $dayRented
     */
    public function __construct(Movie $movie, int $dayRented)
    {
        $this->movie = $movie;
        $this->dayRented = $dayRented;
    }

    /**
     * @return int
     */
    public function getDayRented(): int
    {
        return $this->dayRented;
    }

    /**
     * @return Movie
     */
    public function getMovie(): Movie
    {
        return $this->movie;
    }
}
