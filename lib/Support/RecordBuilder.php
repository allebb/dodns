<?php namespace Ballen\Dodns\Support;

class RecordBuilder extends Builder implements BuilderInterface
{

    const TYPE_STRING = 'string';
    const TYPE_NULLABLE = 'null';
    const TYPE_NUMBER = 'number';
    
    public $endpoint = 'records';

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

    public function requestBody()
    {
        return json_encode($this->object_data);
    }

    private function validateRequired($data, $field)
    {
        // By checking against the 'type' we can check which fields are required for the other values...
    }

    private function validateDataType($data, $field)
    {
        // If the valid data types is an array we'll check that the data matches one of them in a string comparision.
        if (is_array($field)) {
            foreach ($field as $items) {
                if ($data === $items) {
                    return true;
                }
            }
            return false;
        }
        // If the data is not an array we'll check the data type.
        if (gettype($data) == $field) {
            return true;
        }
        return false;
    }
}
