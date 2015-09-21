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
