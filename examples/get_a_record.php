<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of getting details of a single record.
 */
// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns(new CredentialManager(file_get_contents('token.txt')));

// Set the domain entity that the record exists against...
$domain = new \Ballen\Dodns\Entities\Domain();
$domain->setName('mytestdomain.uk');

// Provide the record ID that you wish to get the details of (if you don't know this, call the records() method first, see the 'get_all_records_for_a_domain.php' example file!)
$record_id = 9013589;

// You can now access the record details...
$record = $dns->record($domain, $record_id);

// Want to inspect the data?
//var_dump($record);

// Access the entity properties using the 'getX' methods...
echo "Record type: " . $record->getType() . "<br>";
echo "Record name: " . $record->getName() . "<br>";
echo "Record data (eg. Server IP for a 'A' record): " . $record->getData() . "<br>";
