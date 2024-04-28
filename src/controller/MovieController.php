<?php

namespace controller;

use DI\Container;
use Model\MovieModel;
use Predis\Client;

class MovieController
{
    /** @var MovieModel */
    private $movieModel;

    private $redisClient;

    public function __construct(Container $container)
    {
        $this->movieModel = $container->get('model.movie'); // Adjust the model name accordingly
        $this->redisClient =  new Client();// Initialize the Predis client
    }

    public function createMovieAction()
    {
        return $this->movieModel->createMovie();
    }

    public function getMovieAction($id)
    {
        // Check if data exists in Redis
        $redisKey = "movie:$id";
        if ($this->redisClient->exists($redisKey)) {
            // Data exists in Redis, retrieve it
            return json_decode($this->redisClient->get($redisKey), true);
        }

        // Data doesn't exist in Redis, fetch it from the database
        $movieData = $this->movieModel->getMovie($id);

        // Store the data in Redis with a 5-minute TTL
        $this->redisClient->setex($redisKey, 300, json_encode($movieData));

        return $movieData;
    }
    public function getMovieListAction()
    {
        // Check if data exists in Redis for the movie list
        $redisKey = 'movie_list';
        if ($this->redisClient->exists($redisKey)) {
            // Data exists in Redis, retrieve it
            return json_decode($this->redisClient->get($redisKey), true);
        }
    
        // Data doesn't exist in Redis, fetch it from the database
        $movieList = $this->movieModel->getMovieList();
    
        // Store the data in Redis with a 5-minute TTL
        $this->redisClient->setex($redisKey, 300, json_encode($movieList));
    
        return $movieList;
    }
}