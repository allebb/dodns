<?php namespace Ballen\Dodns\Support;

use Ballen\Dodns\Handlers\ApiRequest;

abstract class Builder
{

    private $request;

    public function __construct()
    {
        $this->request = new ApiRequest;
    }

    public function create()
    {
        $response = $this->request->request($this->endpoint, 'POST', $this->requestBody());
    }
}
