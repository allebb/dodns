<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of creating a new domain
 */
// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns(new CredentialManager(file_get_contents('token.txt')));

// Using the DomainBuilder class we#ll create a new domain object that we can then use to create the domain with...
$domain = new \Ballen\Dodns\Support\DomainBuilder('mytestdomain4.com', '80.23.22.22');

// Now we carry out the creation and check if it was successful...
$new_domain = $dns->createDomain($domain);
if ($new_domain) {
    echo sprintf("Congratulations, the domain <strong>%s</strong> has been created successfully!", $new_domain->getName());
}