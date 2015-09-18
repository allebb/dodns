<?php namespace Ballen\Dodns\Support;

use Ballen\Dodns\Handlers\ApiRequest;

abstract class Builder
{

    public function create()
    {
        return $this->requestBody();
    }
}
