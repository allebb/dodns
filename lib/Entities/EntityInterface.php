<?php namespace Ballen\Dodns\Entities;

use GuzzleHttp\Psr7\Response;

interface EntityInterface
{

    // Each entity must have an id() method of which returns the ID that can be used to identify the entity to the DigitalOcean API.
    public function id();
    
}
