<?php
// tests/PostControllerTest.php

use controller\PostController;
use DI\Container;
use Model\MovieModel;
use Predis\Client;
use PHPUnit\Framework\TestCase;

class PostControllerTest extends TestCase
{
    public function testGetMovieAction()
    {
        // Mock the'this->movieModel'
        $movieModelMock = $this->createMock(MovieModel::class);
        $movieModelMock->expects($this->once())
            ->method('getMovie')
            ->with(42) // Replace with the actual movie ID
            ->willReturn(['id' => 42, 'title' => 'Sample Movie']);

        // Mock 'this->redisClient'
        $redisClientMock = $this->createMock(Client::class);
        $redisClientMock->expects($this->once())
            ->method('exists')
            ->with('movie:42') // Replace with the actual movie ID
            ->willReturn(false);

        $redisClientMock->expects($this->once())
            ->method('setex')
            ->with('movie:42', 300, json_encode(['id' => 42, 'title' => 'Sample Movie']));

        // Create an instance of PostController with mocked dependencies
        $containerMock = $this->createMock(Container::class);
        $containerMock->method('get')->willReturnMap([
            ['model.movie', $movieModelMock],
            ['predis.client', $redisClientMock],
        ]);

        $controller = new PostController($containerMock);

        // Call the controller action
        $result = $controller->getMovieAction(42); // Replace with the actual movie ID

        // Assert the expected result
        $this->assertEquals(['id' => 42, 'title' => 'Sample Movie'], $result);
    }
}
