<?php namespace Ballen\Dodns\Entities;

/**
 * DODNS
 *
 * DODNS (DigitalOcean DNS) is a PHP library for managing DNS records hosted on
 * DigitalOcean.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @version 1.0.0
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/dodns
 * @link http://www.bobbyallen.me
 */

/**
 * Magic method documentation (inheritated from the Entity class)
 * @method $this getId() Get the record ID.
 * @method $this setId($value) Set or update the record ID.
 * @method $this getType() Get the record type value ()
 * @method $this setType($value) Set or update the record type value ()
 * @method $this getName() Get the record name (eg. )
 * @method $this setName($value) Set or update the record name value (eg. )
 * @method $this getData() Get the record data value (eg. 172.24.54.22 or 'cname.example.com')
 * @method $this setData($value) Set or update the record type value (eg. '172.24.3.22' or '@')
 * @method $this getPriority() Get the record priority value (eg. 10)
 * @method $this setPriority(int $value) Set or update the record priority value (eg. 10)
 * @method $this getPort() Get the record port value (eg.80)
 * @method $this setPort(int $value) Set or update the record port value (eg. 80)
 * @method $this getWeight() Get the record weight value (eg. 100)
 * @method $this setWeight(int $value) Set or update the record weight value (eg. 100)
 * 
 */
class Record extends Entity implements EntityInterface
{

    /**
     * The valid record entity fields (used to validate record entity input data).
     * @var array
     */
    protected $fields = [
        'id', // eg. 765222
        'type', // eg. "A"
        'name', // eg. "www"
        'data', // eg. "172.24.34.33"
        'priority', // eg. null
        'port', // eg. null
        'weight', // eg. null
    ];

    /**
     * Construct the Record entity object.
     * @param array $record Optionally set the content of the record entity with an array of key and values.
     */
    public function __construct($record = null)
    {
        if (!is_null($record)) {
            $this->validateFieldDataMatch(array_keys($record));
        }
        $this->data = $record;
    }

    /**
     * Returns the unique identifier for the entity object.
     * @return string
     */
    public function id()
    {
        return $this->getId();
    }
}
