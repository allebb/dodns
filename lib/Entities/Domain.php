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
 *
 */
class Domain extends Entity implements EntityInterface
{

    /**
     * The valid record entity fields (used to validate record entity input data).
     * @var array
     */
    protected $fields = [
        'name', // The domain name
        'ttl', // The "time to live" for the domain.
        'zone_file', // The zone file content.
    ];

    /**
     * Construct the Domain entity object.
     * @param array $domain Optionally set the content of the domain entity with an array of key and values.
     */
    public function __construct($domain = null)
    {
        if (!is_null($domain)) {
            $this->validateFieldDataMatch(array_keys($domain));
        }
        $this->data = $domain;
    }

    /**
     * Returns the unique identifier for the entity object.
     * @return string
     */
    public function id()
    {
        return $this->getName();
    }
}
