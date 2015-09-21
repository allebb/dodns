<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of deleting a domain record.
 */
// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns(new CredentialManager(file_get_contents('token.txt')));

// Set the domain entity that the record exists against...
$domain = new \Ballen\Dodns\Entities\Domain();
$domain->setName('mytestdomain.uk');

// Provide the record ID that you wish to delete (if you don't know this, call the records() method first, see the 'get_all_records_for_a_domain.php' example file!)
$record_id = 9012666;

// Now we carry out the deletion and check if it was successful...
if (!$dns->deleteRecord($domain, $record_id)) {
    echo "An error occured and the domain record could not be deleted!";
} else {
    echo sprintf("Congratulations, the domain record has been deleted successfully!");
}