<?php

class Movie {
    private $movieId;
    private $title;
    private $casts;
    private $releaseDate;
    private $director;

    /**
     * Get the movie ID.
     *
     * @return int
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * Set the movie ID.
     *
     * @param int $movieId
     */
    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    /**
     * Get the movie title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the movie title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the cast members.
     *
     * @return string|null
     */
    public function getCasts()
    {
        return $this->casts;
    }

    /**
     * Set the cast members.
     *
     * @param string|null $casts
     */
    public function setCasts($casts)
    {
        $this->casts = $casts;
    }

    /**
     * Get the release date.
     *
     * @return string
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set the release date.
     *
     * @param string $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * Get the director's name.
     *
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set the director's name.
     *
     * @param string $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }
}
