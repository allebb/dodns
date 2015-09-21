<?php namespace Ballen\Dodns\Support;

/**
 * DODNS
 *
 * DODNS (DigitalOcean DNS) is a PHP library for managing DNS records hosted on
 * DigitalOcean.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @version 1.0.0
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/dodns
 * @link http://www.bobbyallen.me
 *
 */
interface BuilderInterface
{

    /**
     * Outputs the API request body for the domain/record API operations 
     * for example the PUT and POST HTTP requests.
     */
    public function requestBody();
}
