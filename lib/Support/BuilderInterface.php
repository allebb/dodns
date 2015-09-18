<?php namespace Ballen\Dodns\Support;

interface BuilderInterface
{

    /**
     * Outputs the API request body for the domain/record creation (POST) request.
     */
    public function requestBody();
}
