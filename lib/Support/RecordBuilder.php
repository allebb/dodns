<?php namespace Ballen\Dodns\Support;

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
class RecordBuilder extends Builder implements BuilderInterface
{

    /**
     * The object data.
     * @var array
     */
    private $object_data = [];

    /**
     * Create a new instance of a Domain entity.
     * @param string $type The record type (eg. A)
     * @param string $name The record name including the domain name (eg. )
     * @param string $data The record "data" eg. (172.24.33.2)
     * @param type $priority Optionally set the priority order (for MX records)
     * @param type $port Optionally set the port for SRV records
     * @param type $weight Optionally set the weight
     */
    public function __construct($type, $name, $data, $priority = null, $port = null, $weight = null)
    {
        $this->object_data['type'] = $type;
        $this->object_data['name'] = $name;
        $this->object_data['data'] = $data;

        if (!is_null($priority)) {
            $this->object_data['priority'] = $priority;
        }
        if (!is_null($port)) {
            $this->object_data['port'] = $port;
        }
        if (!is_null($priority)) {
            $this->object_data['weight'] = $weight;
        }
    }

    /**
     * Constructs and returns the API request body.
     * @return string
     */
    public function requestBody()
    {
        return json_encode($this->object_data);
    }
}
