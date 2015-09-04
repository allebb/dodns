<?php namespace Ballen\Dodns\Entities;

abstract class Entity
{

    /**
     * The entity data.
     * @var array
     */
    protected $data = [];

    /**
     * Validates that the associated array data matches the required fields (keys) as set on the entity object.
     * @param array $data The data to instantiate the entity object with. eg. ['name' => 'www', 'ip_address' => '172.x.x.x']
     * @throws \Ballen\Exceptions\EntityFieldCountException
     */
    protected function validateFieldDataMatch($data)
    {
        if (count(array_diff($this->fields, $data)) != 0) {
            throw new \Ballen\Dodns\Exceptions\EntityFieldException('There is a mismatch between the fields supplied and the field set required.');
        }
    }

    /**
     * Returns the property value from the entity object.
     * @param string $key The property key.
     * @param mixed $default Optional default value (defaulted to (bool) false)
     * @return mixed
     */
    private function getEntityProperty($key, $default = false)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        } else {
            return $default;
        }
    }

    /**
     * Set the entity property
     * @param string $key The entity property key
     * @param string $value The entity property value (default value for data is null)
     */
    private function setEntityProperty($key, $value = null)
    {
        $this->data[$key] = $value;
    }

    /**
     * Magic call method used for enabling users to get and set entity property values using methods.
     * @param string $name
     * @param array $arguments
     * @throws \RuntimeException
     */
    public function __call($name, $arguments)
    {
        $property_name = strtolower(ltrim(ltrim($name, 'get'), 'set'));

        $value = null;
        if (count($arguments) > 0) {
            $value = $arguments[0];
        }

        switch (substr($name, 0, 3)) {
            case "set":
                $this->setEntityProperty($property_name, $value);
                break;
            case "get":
                if (array_key_exists($property_name, $this->data)) {
                    return $this->getEntityProperty($property_name);
                }
                break;
            default:
                throw new \RuntimeException('The method "' . $name . '" does not exist in this class.');
        }
    }

    /**
     * Exports the entity data to an array.
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Exports the entity data to JSON
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
