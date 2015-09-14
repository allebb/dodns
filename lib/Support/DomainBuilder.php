<?php namespace Ballen\Dodns\Support;

class DomainBuilder implements BuilderInterface
{

    private $object_data = [
        'name' => false,
        'ip_address' => '127.0.0.1',
    ];

    public function requestBody()
    {
        return json_encode($this->object_data);
    }
}
