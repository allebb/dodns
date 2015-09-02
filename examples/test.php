<?php
require_once '../lib/Exceptions/EntityFieldException.php';
require_once '../lib/Entities/Entity.php';
require_once '../lib/Entities/DomainEntity.php';
require_once '../lib/Entities/RecordEntity.php';

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

//var_dump($new_record->toArray());