<?php 
class Rating {
    private $ratingId;
    private $movieId;
    private $imdbRating;
    private $rottenTomatoRating;

    /**
     * Get the rating ID.
     *
     * @return int
     */
    public function getRatingId()
    {
        return $this->ratingId;
    }

    /**
     * Set the rating ID.
     *
     * @param int $ratingId
     */
    public function setRatingId($ratingId)
    {
        $this->ratingId = $ratingId;
    }

    /**
     * Get the movie ID associated with this rating.
     *
     * @return int
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * Set the movie ID associated with this rating.
     *
     * @param int $movieId
     */
    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    /**
     * Get the IMDb rating.
     *
     * @return float
     */
    public function getImdbRating()
    {
        return $this->imdbRating;
    }

    /**
     * Set the IMDb rating.
     *
     * @param float $imdbRating
     */
    public function setImdbRating($imdbRating)
    {
        $this->imdbRating = $imdbRating;
    }

    /**
     * Get the Rotten Tomatoes rating.
     *
     * @return float
     */
    public function getRottenTomatoRating()
    {
        return $this->rottenTomatoRating;
    }

    /**
     * Set the Rotten Tomatoes rating.
     *
     * @param float $rottenTomatoRating
     */
    public function setRottenTomatoRating($rottenTomatoRating)
    {
        $this->rottenTomatoRating = $rottenTomatoRating;
    }
}
