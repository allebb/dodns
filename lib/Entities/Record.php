<?php namespace Ballen\Dodns\Entities;

class Record extends Entity implements EntityInterface
{

    protected $fields = [
        'id', // eg. 765222
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
}
