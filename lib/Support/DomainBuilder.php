<?php namespace Ballen\Dodns\Support;

class DomainBuilder extends Builder implements BuilderInterface
{

    private $object_data = [
        'name' => false,
        'ip_address' => '127.0.0.1',
    ];
    
    public $endpoint = 'domains';

    public function requestBody()
    {
        return json_encode($this->object_data);
    }
}
