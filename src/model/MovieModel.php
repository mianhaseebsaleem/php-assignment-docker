<?php

namespace Model;

use repository\MovieRepository;

class MovieModel
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getMovie($id)
    {
        $movie = [];
        $result = $this->movieRepository->getMovie($id);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $movie[] = $row;
            }
        }

        return [
            'data' => $movie
        ];
    }

    public function getMovieList($request = null)
    {
        $movie = [];
        $result = $this->movieRepository->getMovieList($request);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $movie[] = $row;
            }
        }

        return [
            'data' => $movie
        ];
    }

    function validateMovieFields(array $requestBody): bool
    {
        $requiredFields = ['name', 'release_date', 'director'];
    
        foreach ($requiredFields as $field) {
            if (!isset($requestBody[$field])) {
                return false;
            }
        }
    
        return true;
    }

    public function createMovie()
    {
        $requestBody = file_get_contents("php://input");
        $requestBody = json_decode($requestBody, true);

        if (!$this->validateMovieFields($requestBody)) {
            http_response_code(400);

            // Return JSON response with error message
            $response = [
                'error' => 'Bad Request',
                'message' => 'Missing required parameters. Please provide name, release_date and director value'
            ];

            // Set Content-Type header to indicate JSON response
            header('Content-Type: application/json');

            // Encode the response data into JSON format and echo it
            return $response;
        }

        $result = $this->movieRepository->createMovie($requestBody);

        return [
            'data' => $result ? 'Movie Created Successfully' : "There was an error while creating Movie"
        ];
    }
}