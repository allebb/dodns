<?php namespace Ballen\Dodns\Entities;

class DomainEntity extends Entity implements EntityInterface
{

    protected $fields = [
        'name', // eg. "mydomain.com"
        'ip_address', // eg. "172.24.65.44"
    ];

    public function __construct($domain = null)
    {
        if (!is_null($domain)) {
            $this->validateFieldDataMatch(array_keys($domain));
        }
    }

    public function id()
    {
        
    }

    public function requestBody()
    {
        
    }

}
