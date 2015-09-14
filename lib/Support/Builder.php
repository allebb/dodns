<?php namespace Ballen\Dodns\Support;

abstract class Builder
{

    // Sends the API request to DigitalOcean and returns boolean value (if it's a 204 response) otherwise we thrown an exception!
    public function create()
    {
        // Send the request to the API.
    }

    // Saves changes to an existing record to DigitalOcean and returns boolean value (if its a 204 response) otherwise will thrown an exception.
    public function update()
    {
        // Send the request to the API.
    }
}
