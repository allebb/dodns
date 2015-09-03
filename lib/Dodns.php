<?php namespace Ballen\Dodns;

use Ballen\Dodns\Handlers\ApiRequest;
use Ballen\Dodns\Entities\DomainEntity;
use Ballen\Dodns\Entities\RecordEntity;

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
        return $this->api_handler->request('domains', self::GET)->toCollection('domains', DomainEntity::class);
    }

    public function domain(DomainEntity $domain)
    {
        return $this->api_handler->request('domains/' . $domain->id(), self::GET)->toEntity('domain', DomainEntity::class);
    }

    public function createDomain(DomainEntity $domain)
    {
        
    }

    public function updateDomain(DomainEntity $domain)
    {
        
    }

    public function deleteDomain(DomainEntity $domain)
    {
        
    }

    public function records()
    {
        
    }

    public function record(RecordEntity $record)
    {
        
    }

    public function createRecord(RecordEntity $record)
    {
        
    }

    public function updateRecord(RecordEntity $record)
    {
        
    }

    public function deleteRecord(RecordEntity $record)
    {
        
    }
}
