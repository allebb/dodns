<?php namespace Ballen\Dodns\Entities;

class Domain extends Entity implements EntityInterface
{

    protected $fields = [
        'name',
        'ttl',
        'zone_file',
    ];

    public function __construct($domain = null)
    {
        if (!is_null($domain)) {
            $this->validateFieldDataMatch(array_keys($domain));
        }
        $this->data = $domain;
    }

    public function id()
    {
        return $this->data['name'];
    }
}
