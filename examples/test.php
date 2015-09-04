<?php
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;
use Ballen\Dodns\Entities\Domain;

// Set your DigitalOcean API key here!
$digitalocean_api_v2_token = require_once 'token.php';

$test = new Dodns(new CredentialManager($digitalocean_api_v2_token));

/**
 * Example of getting and displaying all of your currently configured domains:
 */
var_dump($test->domains());

/**
 * Example of returning a single domain.
 */
var_dump($test->domain(new Domain([
        'name' => 'alln.uk',
        'ttl' => 3000,
        'zone_file' => null
])));
