<?php namespace Ballen\Dodns\Handlers;

use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Exceptions\ApiErrorException;
use Ballen\Dodns\Handlers\ApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;

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
class ApiRequest
{

    /**
     * The API server base address (includes the API version number).
     */
    const HOST_API_ADDR = "https://api.digitalocean.com/v2/";

    /**
     * The Guzzle HTTP client instance.
     * @var Client
     */
    private $http_client;

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
     * @param array|string $data The HTTP request body
     * @return ApiResponse
     */
    public function request($endpoint, $method = 'GET', $data = false)
    {

        if (is_string($data)) {
            $request = new Request($method, ltrim($endpoint, '/'), $this->http_client->getConfig()['headers'], $data);
        } else {
            $request = new Request($method, ltrim($endpoint, '/'));
        }

        try {
            $result = new ApiResponse($this->http_client->send($request));
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $status = null;
            $message = null;
            $object = null;
            if ($exception->getResponse()) {
                $response = $exception->getResponse();
                $status = json_decode($response->getBody())->id;
                $message = json_decode($response->getBody())->message;
                $object = $response;
            }
            throw new ApiErrorException('An API request error occured: ' . $exception->getResponse()->getBody(), $exception->getResponse()->getStatusCode(), $status, $message, $object);
        }
        return $result;
    }
}
