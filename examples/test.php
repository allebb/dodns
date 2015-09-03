<?php
require_once '../vendor/autoload.php';
use Ballen\Dodns\CredentialManager;
use Ballen\Dodns\Dodns;
use Ballen\Dodns\Entities\DomainEntity;

// Set your DigitalOcean API key here!
$digitalocean_api_v2_token = 'fabcad1bb522f4b382be858d3f419c206e7b6e72248018bab5e71af8d448c593';


$test = new Dodns(new CredentialManager($digitalocean_api_v2_token));

/**
 * Example of getting and displaying all of your currently configured domains:
 */
$test->domains();

/**
 * Example of returning a single domain.
 */
$test->domain(new DomainEntity([
    'name' => 'alln.uk',
    'ttl' => 3000,
    'zone_file' => null
]));
