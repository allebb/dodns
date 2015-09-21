<?php namespace Ballen\Dodns\Exceptions;

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
class ApiErrorException extends \Exception
{

    /**
     * The HTTP status code as returned by Guzzle.
     * @var int
     */
    private $status_code = 200;
    
    /**
     * The API status_id field response from the DigitalOcean API.
     * @var string
     */
    private $status_id = '';
    
    /**
     * The API status_message field response from the DigitalOcean API.
     * @var string
     */
    private $status_message = '';
    
    /**
     * The Guzzle response object
     * @var type 
     */
    private $guzzle_response;

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

    /**
     * Get the HTTP status code (eg. 200)
     * @return type
     */
    public function apiStatusCode()
    {
        return $this->status;
    }

    /**
     * Get the API status ID from the DigitalOcean response (eg. "not_authorised")
     * @return type
     */
    public function apiStatusId()
    {
        return $this->status;
    }

    /**
     * Get the API response mesage from the DigtialOcean response (eg. "That domain does not exist")
     * @return type
     */
    public function apiResponseMessage()
    {
        return $this->api_response_message;
    }

    /**
     * The Guzzle response object
     * @return type
     */
    public function responseObject()
    {
        return $this->guzzle_response;
    }
}
