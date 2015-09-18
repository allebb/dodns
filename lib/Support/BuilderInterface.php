<?php namespace Ballen\Dodns\Support;

interface BuilderInterface
{

    /**
     * The endpoint URL.
     */
    public function endpoint();

    /**
     * Outputs the API request body for the create method.
     */
    public function requestBody();
}
