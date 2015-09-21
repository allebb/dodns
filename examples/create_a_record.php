<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of creating a new record.
 */
// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns(new CredentialManager(file_get_contents('token.txt')));

// Set the domain of which we are saving the new record against....
$domain = new Ballen\Dodns\Entities\Domain();
$domain->setName('mytestdomain.uk');

// Using the RecordBuilder class we create our record before saving it to the domain via. the API...
$new_record = new Ballen\Dodns\Support\RecordBuilder('A', 'server2', '80.1.1.1');

// Now we carry out the creation and check if it was successful...
$record = $dns->createRecord($domain, $new_record);
if ($record) {
    echo "Congratulations, the record <strong>{$record->getName()}.{$domain->getName()}</strong> has been created successfully!";
}
