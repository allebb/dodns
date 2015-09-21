<?php

/**
 * Example of retrieving all records for a given domain name and outputting them to the screen.
 */

// Storing your DigitalOcean API key in a text file - Would recommend you instead use a environmental variable by for testing this is fine!
$api_user_token = file_get_contents('token.txt');

// Create a new instance of the CredentialManager class...
$credentials = new Ballen\Dodns\CredentialManager($api_user_token);

// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new \Ballen\Dodns\Dodns($credentials);



