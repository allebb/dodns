<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of retrieving all domains configured on a DigitalOcean account and outputting them!
 */
// Storing your DigitalOcean API key in a text file - Would recommend you instead use a environmental variable by for testing this is fine!
$api_user_token = file_get_contents('token.txt');

// Create a new instance of the CredentialManager class...
$credentials = new CredentialManager($api_user_token);

// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns($credentials);

// Retrieve all the domains for your account...
$my_domains = $dns->domains();

// If the account does not have any domains configured we'll just send an error message now and be done with it!
if (!$my_domains->count()) {
    echo 'You have no domains configured on your account at present!';
    die();
}

// Using the collection object you can get the total number of configured domains....
echo 'You have a total of ' . $my_domains->count() . ' domains on your account.';

// You can use the standard 'foreach()' function to iterate over them or use the collection method like so...
foreach ($my_domains->all()->toObject() as $domain) {
    echo sprintf("<p> - %s</p>", $domain->getName());
}
