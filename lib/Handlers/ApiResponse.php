<?php namespace Ballen\Dodns\Handlers;

use Psr\Http\Message\ResponseInterface;

class ApiResponse
{

    private $response;

    // Will require a Guzzle response here!!
    public function __construct(ResponseInterface $response, $cast)
    {
        $this->response = $response;
        var_dump($this->response->getStatusCode() . ' - ' . $this->response->getBody());
        return $this->castAs($cast);
    }

    private function castAs($class)
    {
        if (!class_exists($class)) {
            throw new \Ballen\Dodns\Exceptions\EntityNotFoundException('The entity that you are attempting to cast to (' . $class . ') could not be found!');
        }
        $entity_object = new $class();
        $entity_object->loadFromResponse($this->response);
        return $entity_object;
    }
}
