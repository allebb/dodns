<?php
require_once '../vendor/autoload.php';

$test = new \Ballen\Dodns\Dodns(new \Ballen\Dodns\CredentialManager('fabcad1bb522f4b382be858d3f419c206e7b6e72248018bab5e71af8d448c593'));
$test->domain(new \Ballen\Dodns\Entities\DomainEntity(['name' => 'alln.uk', 'ttl' => 3000, 'zone_file' => null]));
