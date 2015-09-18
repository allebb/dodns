<?php namespace Ballen\Dodns\Support;

class DomainBuilder extends Builder implements BuilderInterface
{

    const EXCEPTION_DOMAIN_FORMAT_INVALID = "Domain name format is invalid";
    const EXCEPTION_IP_FORMAT_INVALID = "The IP address format is invalid";

    private $object_data = [
        'name' => false,
        'ip_address' => false,
    ];
    public $endpoint = 'domains';

    public function __construct($name, $ip_address = '127.0.0.1')
    {
        parent::__construct();
        $this->object_data['name'] = $name;
        $this->object_data['ip_address'] = $ip_address;
    }

    public function setDomainName($domain)
    {
        $this->object_data['name'] = $domain;
    }

    public function setIpAddress($ip_address)
    {
        $this->object_data['ip_address'] = $ip_address;
    }

    public function requestBody()
    {
        return json_encode($this->object_data);
    }

    private function validateDomainName($domain)
    {
        if (!preg_match('/([0-9a-z-]+\.)?[0-9a-z-]+\.[a-z]{2,7}/', $domain)) {
            throw new \Ballen\Dodns\Exceptions\DataFormatException(self::EXCEPTION_IP_FORMAT_INVALID);
        }
    }

    private function validateIpAddress($ip_address)
    {
        $octals = explode('.', $ip_address);

        if (count($octals) > 4) {
            throw new \Ballen\Dodns\Exceptions\DataFormatException('');
        }
        foreach ((int) $octals as $octal) {
            if (!($octal >= 0) || ($octal <= 255)) {
                throw new \Ballen\Dodns\Exceptions\DataFormatException(self::EXCEPTION_IP_FORMAT_INVALID);
            }
        }
    }
}
