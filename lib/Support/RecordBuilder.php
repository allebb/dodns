<?php namespace Ballen\Dodns\Support;

class RecordBuilder implements BuilderInterface
{

    private $build_data = [
        'type' => false,
        'name' => false,
        'data' => false,
        'priority' => false,
        'port' => false,
        'weight' => false,
    ];
    private $valid_types = [
        'A',
        'AAAA',
        'CNAME',
        'TXT',
        'SRV',
    ];
    private $required_data = [
        'A',
        'AAAA',
        'CNAME',
        'MX',
        'TXT',
        'SRV',
        'NS',
    ];
    private $required_priority = [
        'MX',
        'SRV',
    ];
    private $required_port = [
        'SRV',
    ];
    private $required_weight = [
        'SRV',
    ];

    public function type()
    {
        
    }

    public function name()
    {
        
    }

    public function data()
    {
        
    }

    public function priority()
    {
        
    }

    public function port()
    {
        
    }

    public function weight()
    {
        
    }

    public function requestBody()
    {
        ;
    }
}
