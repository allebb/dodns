<?php namespace Ballen\Dodns\Support;

class RecordBuilder extends Builder implements BuilderInterface
{

    private $object_data = [];

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

    public function requestBody()
    {
        return json_encode($this->object_data);
    }
}
