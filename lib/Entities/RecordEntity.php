<?php namespace Ballen\Dodns\Entities;

class RecordEntity extends Entity implements EntityInterface
{

    protected $fields = [
        'type', // eg. "A"
        'name', // eg. "www"
        'data', // eg. "172.24.34.33"
        'priority', // eg. null
        'port', // eg. null
        'weight', // eg. null
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
