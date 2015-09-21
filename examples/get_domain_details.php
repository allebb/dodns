<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;
use Ballen\Dodns\Entities\Domain;

/**
 * Example of retrieving the domain specific information (Zonefile and TTL) and outputting it.
 */
// Storing your DigitalOcean API key in a text file - Would recommend you instead use a environmental variable by for testing this is fine!
$api_user_token = file_get_contents('token.txt');

// Create a new instance of the CredentialManager class...
$credentials = new CredentialManager($api_user_token);

// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns($credentials);

// Retrieve the domain information...
$domain = new Domain();
$domain->setName('mytestdomain.uk');

// Make the request to the API and get the Domain entity object
$domain_details = $dns->domain($domain);

// See the raw data...
//var_dump($domain_details);

// Or simply output the ttl value or zonefile...
echo 'Domain details for: ' .$domain_details->getName(). '<br>';
echo 'Domain TTL value: ' . $domain_details->getTtl() . '</br>';
echo "Domain zonefile content:<br>";
echo '<pre>' . $domain_details->getZone_file() . '</pre>';
