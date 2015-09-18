<?php namespace Ballen\Dodns;

class CredentialManager
{

    /**
     * Object storage for the DigitalOcean API token.
     * @var string
     */
    private $token = null;

    /**
     * Create a new instance of the Credentials Manager object.
     * @param string $token The DigitalOcean API token.
     */
    public function __construct($token = null)
    {
        if (!is_null($token)) {
            $this->setToken($token);
        }
    }

    /**
     * Gets (or Sets) the DigitialOcean API key.
     * @param null|string $token To set the API token, specify it otherwise if none is specified it will output your currently set token.
     * @return type
     */
    public function token($token = false)
    {
        if (!$token) {
            return $this->token;
        }
        $this->setToken($token);
    }

    /**
     * Sets the API token.
     * @param string $token The API token to use.
     */
    private function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Gets the API token.
     * @return string The API token that has been set.
     * @throws \InvalidArgumentException
     */
    private function getToken()
    {
        if (is_null($this->token)) {
            throw new \InvalidArgumentException('The API token is required but has not been set.');
        }
        return $this->token;
    }
}
