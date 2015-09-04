<?php namespace Ballen\Dodns;

use Ballen\Dodns\Entities\Domain;
use Ballen\Dodns\Entities\Record;
use Ballen\Dodns\Handlers\ApiRequest;
use Ballen\Dodns\Support\DomainBuilder;
use Ballen\Dodns\Support\RecordBuilder;

class Dodns
{

    /**
     * HTTP Method Constants
     */
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";

    /**
     * The API request class.
     * @var Ballen\Dodns\Handlers\ApiRequest
     */
    private $api_handler;

    public function __construct(CredentialManager $credentials)
    {
        $this->api_handler = new ApiRequest($credentials);
    }

    /**
     * Return a colleciton of all domains that are configured in DigitalOcean DNS.
     * @return Ballen\Collection\Collection
     */
    public function domains()
    {
        return $this->api_handler->request('domains', self::GET)->toCollection('domains', Domain::class);
    }

    /**
     * Return a specific domain object configured in DigitalOcean DNS.
     * @param
     * @return Ballen\Dodns\Entities\Domain
     */
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
        if ($this->api_handler->request('domains/' . $domain->id(), self::DELETE)->guzzleInstance()->getStatusCode() != 204) {
            throw new Exceptions\ApiActionException('The domain could not be deleted!');
        }
        return true;
    }

    /**
     * Return a colleciton of all domain records for a given domain.
     * @param Domain $domain The domain of which to get all records for.
     * @return Ballen\Collection\Collection
     */
    public function records(Domain $domain)
    {
        return $this->api_handler->request('domains/' . $domain->id() . '/records', self::GET)->toCollection('domain_records', Record::class);
    }

    /**
     * Return a specific record object from a specific domain.
     * @param Domain $domain The domain of which the record belongs to.
     * @param int $record_id The record ID of which to return.
     * @return  Ballen\Dodns\Entities\Record
     */
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
