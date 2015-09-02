# DODNS

DODNS (DigitalOceanDNS) is a PHP library for managing DNS records hosted on DigitalOcean.

**This library is currently a work in progress!**

Requirements
------------

This library is developed and tested for PHP 5.3+

This library is unit tested against PHP 5.3, 5.4, 5.5, 5.6, HHVM and 7.0!

License
-------

This client library is released under the MIT license, a [copy of the license](https://github.com/bobsta63/dodns/blob/master/LICENSE) is provided in this package.

Setup
-----

To install the package into your project (assuming you are using the [Composer](https://getcomposer.org/) package manager) you can simply execute the following command from your terminal in the root of your project folder:

```
composer require ballen/dodns
```


Alternatively you can manually add this library to your project using the following steps, simply edit your project's ``composer.json`` file and add the following lines (or update your existing ``require`` section with the library like so):

```php
"require": {
        "ballen/dodns": "~1.0"
}
```

Then install the package like so:

```
composer update ballen/dodns --no-dev
```

Examples
--------

TBC

Tests and coverage
------------------

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use [TravisCI](https://travis-ci.org/) for continuous integration, which triggers tests for PHP 5.3, 5.4, 5.5, 5.6, 7.0 and HHVM every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```
# Install the DODNS Library with the 'development' packages this then includes PHPUnit!
composer install --dev

# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be ran but requires XDebug installed...
```
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().


