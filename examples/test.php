<?php
require_once '../vendor/autoload.php';

use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;
use Ballen\Dodns\Entities\Domain;
use Ballen\Dodns\Support\RecordBuilder;

// Set your DigitalOcean API key here!
$digitalocean_api_v2_token = require_once 'token.php';

$test = new Dodns(new CredentialManager($digitalocean_api_v2_token));

/**
 * Example of getting and displaying all of your currently configured domains:
 */
//var_dump($test->domains());

$my_domain = new Domain([
    'name' => 'alln.uk',
    'ttl' => 3000,
    'zone_file' => null
    ]);


/**
 * Example of returning a single domain.
 */
//var_dump($test->domain($my_domain));

/**
 * Example of returning all records for a specific domain.
 */
//var_dump($test->records($my_domain));

/**
 * Example of returning a specific record.
 */
//var_dump($test->record($my_domain, 7843574));



$delete_domain_example = new Domain([
    'name' => 'bobby-test.com',
    'ttl' => 1800,
    'zone_file' => null,
    ]);

/**
 * Example of deleting an entire domain.
 */
//var_dump($test->deleteDomain($delete_domain_example)));

/**
 * Example of deleting a domain record.
 */
//var_dump($test->deleteRecord($delete_domain_example, 8537674));
//$new_domain = $test->createDomain(new DomainBuilder('mytestdodmain.uk', '127.0.0.1'));

$example_update_domain = new Domain([
    'name' => 'mytestdodmain.uk',
    'ttl' => 3600,
    'zone_file' => null,
    ]);

$the_new_record = new RecordBuilder('A', '@', '127.0.0.1');

//$create_record = $test->createRecord($example_update_domain, $the_new_record);


// Lets get a record object from the API
$update_example = $test->record($example_update_domain, 8912064);
// Change the IP address of the current record object
$update_example->setData('172.3.33.10');
// ...finally Save these changes to the API.
$update_record = $test->updateRecord($example_update_domain, $update_example);
var_dump($update_record);