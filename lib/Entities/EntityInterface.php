<?php namespace Ballen\Dodns\Entities;

interface EntityInterface
{

    // Each entity must have an id() method of which returns the ID that can be used to identify the entity to the DigitalOcean API.
    public function id();

    // Outputs the request body that is used for the DigitalOcean API request.
    public function requestBody();
}
