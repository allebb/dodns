<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';

use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;
use Ballen\Dodns\Entities\Domain;
use Ballen\Dodns\Entities\Record;

/**
 * Example of updating a DNS records 'A' name IP address
 */
// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns(new CredentialManager(file_get_contents('token.txt')));

// Set the domain entity that the record exists against...
$domain = new Domain();
$domain->setName('mytestdomain.uk');

// Provide the record ID that you wish to get the details of (if you don't know this, call the records() method first, see the 'get_all_records_for_a_domain.php' example file!)
$record_id = 9013589;

// You can either create an instance of the Domain entity using the record() method to instaniate a record object from the API or create a new record entity manually.
$record = $dns->record($domain, $record_id);

// If you've saved this data in your application then you can manually re-create the domain entity to save on API calls...
//$record = new Record([
//    'id' => $record_id, // The record ID must exist as the API uses this ID to update the record!
//    'type' => 'A',
//    'name' => 'subdomain',
//    'data' => '80.90.22.11',
//    'priority' => null,
//    'port' => null,
//    'weight' => null,
//    ]);

// We'll set the new IP address here...
$new_ip_address = '127.0.0.1';

// Access the entity properties using the 'getX' methods...
echo "The current record IP address is set to {$record->getData()}, we'll now update this to be {$new_ip_address}<br>";

// You can then make changes and save them back to DigitalOcean like so:
$record->setData($new_ip_address); // Update the IP address of the example 'A' record

// Now save these changes back...
if ($dns->updateRecord($domain, $record)) {
    echo 'Successfully saved changes, the IP address has now been updated to!';
}

