<?php namespace Ballen\Dodns\Handlers;

use Ballen\Collection\Collection;
use Ballen\Dodns\Entities\EntityInterface;
use Psr\Http\Message\ResponseInterface;

class ApiResponse
{

    /**
     *  The response object
     * @var Psr\Http\Message\ResponseInterface
     */
    private $response;

    /**
     * Create a new API response instanace.
     * @param ResponseInterface $response The HTTP response object
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Is the response an HTTP error?
     * @return boolean
     */
    public function isError()
    {
        if ($this->response->getStatusCode() > 399) {
            return true;
        }
        return false;
    }

    /**
     * Returns the HTTP status code of the error (or false if the HTTP status code is less than 399)
     * @return boolean|int The HTTP status code returned from the API.
     */
    public function errorCode()
    {
        if ($this->isError()) {
            return (int) $this->response->getStatusCode();
        }
        return false;
    }

    /**
     * Returns the DigitalOcean API error ID eg. "forbidden" of the request (or false if the HTTP status code is less than 399)
     * @return boolean|string 
     */
    public function errorStatus()
    {
        if ($this->isError()) {
            return $this->toJson()->id;
        }
        return false;
    }

    /**
     * Returns the DigitalOcean API error message eg. "You do not have access for the attempted action." of the request (or false if the HTTP status code is less than 399)
     * @return boolean|string
     */
    public function errorMessage()
    {
        if ($this->isError()) {
            return $this->toJson()->message;
        }
        return false;
    }

    /**
     * Return the response body as an assoicated array.
     * @return array The response body as an array.
     */
    public function toArray()
    {
        return json_decode($this->response->getBody(), true);
    }

    /**
     * Return the response body as a JSON string.
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Cast the response to an entity object (a single entity)
     * @param string $section The object key of which is to be extracted (contains the entite(s)). 
     * @param string $entity The entity class of which is used to cast the response to (eg. "\Ballen\Dodns\Entities\Domain::class")
     * @return EntityInterface
     */
    public function toEntity($section, $entity)
    {
        
    }

    /**
     * Cast the response (when there is more than a single record) to a collection of entites
     * @param string $section The object key of which is to be extracted (contains the entite(s)). 
     * @param string $entity The entity class of which is used to cast the response to (eg. "\Ballen\Dodns\Entities\Domain::class")s
     * @return Collection
     */
    public function toCollection($section, $entity)
    {
        
    }

    /**
     * Check that a given class (entity) exists.
     * @param string $class The class name (and namespace).
     * @param type $class
     * @throws \InvalidArgumentException
     */
    private function checkClassExists($class)
    {
        if (!class_exists($class)) {
            throw new \InvalidArgumentException('The entity class (' . $class . ') specified does not exist; did you correctly namespace it?');
        }
    }
}
