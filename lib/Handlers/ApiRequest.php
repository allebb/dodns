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

    /**
     * The Guzzle HTTP client instance.
     * @var GuzzleHttp\Client
     */
    private $http_client;

    /**
     * The entity class the response should be cast to.
     * @var string 
     */
    private $entity;

    /**
     * Create a new instance of the DigitalOcean API request handler
     * @param CredentialManager $credentials The API user credentials
     * @param string $entity The entity class that the response should be cast to (eg. "\Ballen\Dodns\Entities\DomainEntity::class")
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
     * Sends the DigitalOcean API request to the API and returns an API response object.
     * @param string $endpoint The API endpoint address
     * @param string $method The HTTP method used eg. GET, POST, DELETE etc.
     * @param mixed $data The HTTP request body
     * @return ApiResponse
     */
    public function request($endpoint, $method = 'GET', $data = [])
    {
        $request = new Request($method, ltrim($endpoint, '/'), $data);
        return new ApiResponse($this->http_client->send($request));
    }
}
