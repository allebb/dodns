<?php namespace Ballen\Dodns;

use Ballen\Dodns\Entities\Domain;
use Ballen\Dodns\Entities\Record;
use Ballen\Dodns\Handlers\ApiRequest;
use Ballen\Dodns\Support\DomainBuilder;
use Ballen\Dodns\Support\RecordBuilder;

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

    public function createDomain(DomainBuilder $domain)
    {
        
    }

    public function updateDomain(Domain $domain)
    {
        
    }

    public function deleteDomain(Domain $domain)
    {
        
    }

    public function records(Domain $domain)
    {
        return $this->api_handler->request('domains/' . $domain->id() . '/records', self::GET)->toCollection('domain_records', Record::class);
    }

    public function record(Domain $domain, $record_id)
    {
        return $this->api_handler->request('domains/' . $domain->id() . '/records/' . $record_id, self::GET)->toEntity('domain_record', Record::class);
    }

    public function createRecord(RecordBuilder $record)
    {
        
    }

    public function updateRecord(Record $record)
    {
        
    }

    public function deleteRecord(Record $record)
    {
        
    }
}
