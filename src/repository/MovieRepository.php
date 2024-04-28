<?php

namespace repository;

use mysqli;

class MovieRepository
{
    private $mysqli;

    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getMovie($id)
    {
        $query = "SELECT * FROM movies where id = ". $id;

        return $this->mysqli->query($query);
    }

    public function createMovie($requestBody)
    {
        $query = "INSERT INTO movies (name, release_date, director) VALUES (?, ?, ?)";
        $statement = $this->mysqli->prepare($query);

        // Bind parameters to the prepared statement
        $statement->bind_param("sss", $requestBody['"name":'], $requestBody['release_date'], $requestBody['director']);

        // Execute the statement
        return $statement->execute();
    }

    public function getMovieList($requestBody)
    {
        $query = "SELECT * FROM movies";

        return $this->mysqli->query($query);
    }
}