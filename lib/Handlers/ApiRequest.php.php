<?php namespace Ballen\Dodns\Handlers;

use ApiResponse;
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Entities\EntityInterface;
use GuzzleHttp\Client as GuzzleClient;

class ApiRequest
{

    /**
     * The API server base address (includes the API version number).
     */
    const HOST_API_ADDR = "https://api.digitalocean.com/v2/";

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
        $this->http_client = new GuzzleClient();
    }

    /**
     * Retreieve all records (list).
     */
    public function all($endpoint)
    {
        
    }

    /**
     * Retrieve a specific record (get one)
     * @param string $endpoint
     * @param integer $id 
     */
    public function read($endpoint, $id)
    {
        
    }


    public function create($endpoint, EntityInterface $entity)
    {
        
    }

    public function update($endpoint, EntityInterface $entity)
    {
        
    }

    
    public function delete($endpoint, EntityInterface $entity)
    {
        
    }

    private function request()
    {
        return new ApiResponse();
    }
}
