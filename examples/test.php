<?php
require_once '../vendor/autoload.php';

$domain = new Ballen\Dodns\Entities\DomainEntity(['name' => 'www', 'ip_address' => '172.24.65.3']);

/**
 * Example of instantiating a record entnity from an array of key/values.
 */
$record = new Ballen\Dodns\Entities\RecordEntity(
    [
    'type' => 'A',
    'name' => 'www',
    'data' => '162.10.66.0',
    'priority' => null,
    'port' => null,
    'weight' => null,
    ]);

/**
 * Example of building a record entity manually.
 */
$new_record = new Ballen\Dodns\Entities\RecordEntity();
$new_record->setType('A');
$new_record->setName('www');
$new_record->setData('192.168.2.1');
$new_record->setPriority();
$new_record->setPort();
$new_record->setWeight();


/**
 * Get model properies.
 */
$new_record->getType();
echo $new_record->getName();
$new_record->getData();
$new_record->getPriority();
$new_record->getPort();
$new_record->getWeight();

$test = new \Ballen\Dodns\Handlers\ApiRequest(new \Ballen\Dodns\CredentialManager('fabcad1bb522f4b382be858d3f419c206e7b6e72248018bab5e71af8d448c593'), \Ballen\Dodns\Entities\DomainEntity::class);
$test->all('domains');