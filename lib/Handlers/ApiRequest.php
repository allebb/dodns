<?php namespace Ballen\Dodns\Handlers;

use Ballen\Dodns\Handlers\ApiResponse;
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Entities\EntityInterface;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;

class ApiRequest
{

    /**
     * The API server base address (includes the API version number).
     */
    const HOST_API_ADDR = "https://api.digitalocean.com/v2/";
    const HTTP_GET = 'GET';
    const HTTP_POST = 'POST';
    const HTTP_PUT = 'PUT';
    const HTTP_DELETE = 'DELETE';

    /**
     * The Guzzle HTTP client instance.
     * @var type 
     */
    private $http_client;

    /**
     * Create a new instance of the DigitalOcean API request handler
     * @param CredentialManager $credentials The API user credentials
     */
    public function __construct(CredentialManager $credentials)
    {
        $this->http_client = new GuzzleClient([
            'base_uri' => self::HOST_API_ADDR,
            'verify' => false, // Should be disabled in production!!!
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $credentials->token(),
            ],
        ]);
    }

    /**
     * Retreieve all records (list).
     * @param string $endpoint
     */
    public function all($endpoint)
    {
        return $this->request($endpoint, self::HTTP_GET);
    }

    /**
     * Retrieve a specific record (get one)
     * @param string $endpoint
     * @param mixed $id 
     */
    public function read($endpoint, $id)
    {
        return $this->request($endpoint . '/' . $id, self::HTTP_GET);
    }

    /**
     * Create a new record
     * @param string $endpoint The API endpoint (eg. "/domains/{domainname}/records")
     * @param EntityInterface $entity The record/domain entity model to use in the request.
     */
    public function create($endpoint, EntityInterface $entity)
    {
        return $this->request($endpoint . '/' . $id, self::HTTP_POST, $entity->requestBody());
    }

    /**
     * Update an existing record
     * @param string $endpoint The API endpoint (eg. "/domains/{domainname}/records")
     * @param EntityInterface $entity The record/domain entity model to use in the request.
     */
    public function update($endpoint, EntityInterface $entity)
    {
        return $this->request($endpoint . '/' . $entity->id(), self::HTTP_PUT, $entity->requestBody());
    }

    /**
     * Delete an existing record
     * @param string $endpoint The API endpoint (eg. "/domains/{domainname}/records")
     * @param EntityInterface $entity The record/domain entity model to use in the request.
     */
    public function delete($endpoint, EntityInterface $entity)
    {
        return $this->request($endpoint . '/' . $entity->id(), self::HTTP_DELETE);
    }

    /**
     * Sends the DigitalOcean API request to the API and returns an API response object.
     * @param string $endpoint The API endpoint address
     * @param string $method The HTTP method used eg. GET, POST, DELETE etc.
     * @param mixed $data The HTTP request body
     * @return ApiResponse
     */
    private function request($endpoint, $method = 'GET', $data = [])
    {
        $request = new Request($method, ltrim($endpoint, '/'), $data);
        return new ApiResponse($this->http_client->send($request), DomainEntity::class);
    }
}
