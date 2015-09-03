<?php namespace Ballen\Dodns\Entities;

class DomainEntity extends Entity implements EntityInterface
{

    protected $fields = [
        'name', // eg. "mydomain.com"
        'ttl',
        'zone_file',
        //'ip_address', // eg. "172.24.65.44"
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

    public function createRequestBody()
    {
        return json_encode([
            'name' => $this->data['name'],
            'ip_address' => '127.0.0.1', // To be updated!!
        ]);
    }

    public function updateRequestBody()
    {
        return json_encode([
            'name' => $this->data['name'],
            'ttl' => $this->data['ttl'],
        ]);
    }
}
