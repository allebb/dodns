<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of deleting a domain
 */
// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns(new CredentialManager(file_get_contents('token.txt')));

// Set the domain entity that we wish to delete from our account...
$domain = new \Ballen\Dodns\Entities\Domain();
$domain->setName('mytestdodmain.uk');

// Now we carry out the deletion and check if it was successful...
if (!$dns->deleteDomain($domain)) {
    echo "An error occured and the domain could not be deleted!";
} else {
    echo sprintf("Congratulations, the domain <strong>%s</strong> has been deleted successfully!", $domain->getName());
}