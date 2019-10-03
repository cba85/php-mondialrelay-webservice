# PHP Mondialrelay Webservice

An expressive, fluent interface to Mondial Relay's shipping services.

## Installation

Install using Composer :

```
$ composer require cba85/php-mondialrelay-webservice
```

Note: you must have PHP with Soap enabled.

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

// 1. Initialize Mondial Relay webservice with your credentials.
$mondialrelay = new Webservice('BDTEST13', 'PrivateK');

// 2. Create parameters for the method you want to use.
 $parameters = [
    'Pays' => 'FR',
    'Ville' => 'Paris',
    'NbResult' => 5
];

// 3. Call the method using your parameters and get the results in json format
$searchPostcode = $mondialrelay->searchPostcode($parameters)->getResultsInJson();

// {"STAT":"0","Liste":{"Commune":[{"CP":"75001","Ville":"PARIS","Pays":"FR"},{"CP":"75002","Ville":"PARIS","Pays":"FR"},{"CP":"75003","Ville":"PARIS","Pays":"FR"},{"CP":"75004","Ville":"PARIS","Pays":"FR"},{"CP":"75005","Ville":"PARIS","Pays":"FR"}]}}
```

## Docs

See wiki.

## Tests

```
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/MondialRelayTest.php
```