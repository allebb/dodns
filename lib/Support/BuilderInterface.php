<?php namespace Ballen\Dodns\Support;

interface BuilderInterface
{

    /**
     * Outputs the API request body for the create method.
     */
    public function requestBody();
}
