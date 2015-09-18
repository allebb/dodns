<?php namespace Ballen\Dodns\Exceptions;

class ApiErrorException extends \Exception
{

    private $status_code = 200;
    private $status_id = '';
    private $status_message = '';
    private $curl_response;

    /**
     * Initates a new API Error Exception object (custom Exception for DigitalOcean API calls.)
     * @param string $message Generic exception message
     * @param int $http_status_code The HTTP status that the response sent.
     * @param string $api_id The DigitalOcean API response ID string.
     * @param string $api_response The DigtialOcean API message response (human reason)
     * @param type $guzzle_response The Guzzle Response object (to enable lookup of additional info etc.)
     * @param int $code Optional exception code.
     * @param \Ballen\Dodns\Exceptions\Exception $previous
     */
    public function __construct($message, $http_status_code, $api_id, $api_response, $guzzle_response, $code = 0, Exception $previous = null)
    {
        $this->status_code = (int) $http_status_code;
        $this->status_id = $api_id;
        $this->status_message = $api_response;
        $this->guzzle_response = $guzzle_response;
        parent::__construct($message, $code, $previous);
    }

    public function apiStatusCode()
    {
        return $this->status;
    }

    public function apiStatusId()
    {
        return $this->status;
    }

    public function apiResponseMessage()
    {
        return $this->api_response_message;
    }

    public function responseObject()
    {
        return $this->curl_response;
    }
}
