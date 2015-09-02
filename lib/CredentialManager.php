<?php namespace Ballen\Dodns;

class CredentialManager
{

    private $token = null;

    public function __construct($token = null)
    {
        if (!is_null($token)) {
            $this->setToken($token);
        }
    }

    public function token($token = false)
    {
        if (!$token) {
            return $this->token;
        }
        $this->setToken($token);
    }

    private function setToken($token)
    {
        $this->token = $token;
    }

    private function getToken()
    {
        if (is_null($this->token)) {
            throw new \InvalidArgumentException('The API token is required but has not been set.');
        }
        return $this->token;
    }
}
