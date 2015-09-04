<?php namespace Ballen\Dodns;

use Ballen\Dodns\Handlers\ApiRequest;
use Ballen\Dodns\Entities\Domain;
use Ballen\Dodns\Entities\Record;

class Dodns
{

    const GET = "GET";
    const POST = "POST";
    const PUT = "POST";
    const DELETE = "POST";

    private $api_handler;

    public function __construct(CredentialManager $credentials)
    {
        $this->api_handler = new ApiRequest($credentials);
    }

    public function domains()
    {
        return $this->api_handler->request('domains', self::GET)->toCollection('domains', Domain::class);
    }

    public function domain(Domain $domain)
    {
        return $this->api_handler->request('domains/' . $domain->id(), self::GET)->toEntity('domain', Domain::class);
    }

    public function createDomain(Domain $domain)
    {
        
    }

    public function updateDomain(Domain $domain)
    {
        
    }

    public function deleteDomain(Domain $domain)
    {
        
    }

    public function records()
    {
        
    }

    public function record(Record $record)
    {
        
    }

    public function createRecord(Record $record)
    {
        
    }

    public function updateRecord(Record $record)
    {
        
    }

    public function deleteRecord(Record $record)
    {
        
    }
}
