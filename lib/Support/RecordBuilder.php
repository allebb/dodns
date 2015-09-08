<?php namespace Ballen\Dodns\Support;

class RecordBuilder implements BuilderInterface
{

    const TYPE_STRING = 'string';
    const TYPE_NULLABLE = 'null';
    const TYPE_NUMBER = 'number';

    private $object_data = [
        'type' => false,
        'name' => false,
        'data' => false,
        'priority' => null,
        'port' => null,
        'weight' => null,
    ];

    /**
     * Validation rules (data types/allowed values for each field)
     * @var array
     */
    private $validation = [
        'type' => [
            'A',
            'AAAA',
            'CNAME',
            'TXT',
            'SRV',
        ],
        'name' => self::TYPE_STRING,
        'data' => self::TYPE_STRING,
        'priority' => [
            self::TYPE_NULLABLE,
            self::TYPE_NUMBER,
        ],
        'port' => [
            self::TYPE_NULLABLE,
            self::TYPE_NUMBER,
        ],
        'weight' => [
            self::TYPE_NULLABLE,
            self::TYPE_NUMBER,
        ]
    ];

    /**
     * Set of required field values dependent on the 'type' field value.
     * @var array
     */
    private $required = [
        'data' => ['A',
            'AAAA',
            'CNAME',
            'MX',
            'TXT',
            'SRV',
            'NS',
        ],
        'priority' => [
            'MX',
            'SRV',
        ],
        'port' => [
            'SRV',
        ],
        'weight' => [
            'SRV',
        ],
    ];

    public function type($data)
    {
        $this->validateDataTypes($data, $type);
        $this->object_data[$type] = $data;
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
        
    }

    private function validateRequired($data, $field)
    {
        
    }

    private function validateDataType($data, $field)
    {
        
    }
}
