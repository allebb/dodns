<?php
// Autoload the library using Composer, if you're using a framework you shouldn't need to do this!!
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;

/**
 * Example of retrieving all records for a given domain name and outputting them to the screen.
 */
// Storing your DigitalOcean API key in a text file - Would recommend you instead use a environmental variable by for testing this is fine!
$api_user_token = file_get_contents('token.txt');

// Create a new instance of the CredentialManager class...
$credentials = new CredentialManager($api_user_token);

// We now create an instance of the DigitalOcean DNS client passing in our API credentials.
$dns = new Dodns($credentials);

$domain = new \Ballen\Dodns\Entities\Domain();
$domain->setName('mytestdomain.uk');

// The response returns a Collection object...
//var_dump($dns->records($domain));
// Lets iterate over the records and output them....

$response = $dns->records($domain);

// Output some informational text to the user...
echo sprintf("There are <strong>%d</strong> domain records for the <strong>%s</strong> domain", $response->count(), $domain->getName());

echo "<table>" . PHP_EOL;
echo "<tr><th>Record</th><th>Type</th><th>Data</th><th>Priority</th><th>Port</th><th>Weight</th></tr>";
foreach ($response->all()->toObject() as $record) {
    echo sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $record->getName(), $record->getType(), $record->getData(), $record->getPriority(), $record->getPort(), $record->getWeight());
}
echo "</table>" . PHP_EOL;
