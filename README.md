# PHP Mondialrelay Webservice

An expressive, fluent interface to Mondial Relay's shipping services.

## Installation

Install using Composer :

```
$ composer require cba85/php-mondialrelay-webservice
```

Note: you must have PHP with Soap enabled.

## Getting started

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

## Usage

### Webservice

You must obtain Mondial Relay credentials to use the webservice.

You could use Mondial Relay test credentials to try the webservice:

- Enseigne (merchant): `BDTEST13`
- Private key: `PrivateK`

### Available methods

| Method name          | Webservice method name     |
| :------------------- | :------------------------- |
| `searchPostcode()`   | WSI2_RechercheCP           |
| `searchPostcode()`   | WSI2_RechercheCP           |
| `statLabel()`        | WSI2_STAT_Label            |
| `searchParcelshop()` | WSI4_PointRelais_Recherche |
| `createLabel()`      | WSI2_CreationEtiquette     |
| `createShipping()`   | WSI2_CreationExpedition    |
| `getLabels()`        | WSI3_GetEtiquettes         |
| `trackParcel()`      | WSI2_TracingColisDetaille  |

### Results

You can retrieve webservice results as a PHP StdClass Object or in Json format.

```php
$mondialrelay = new Webservice('BDTEST13', 'PrivateK');

// E.g. Call a method
$parameters = [...]; // Parameters of the method

// PHP StdClass object results
$searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResults();

// Json results
$searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResultsInJson();
```

#### Last method call

You could retrieve the results, parameters or call another request of the webservice using `method` attribute that contains the last method call:

```php
$mondialrelay = new Webservice('BDTEST13', 'PrivateK');

// E.g. Call a method
$parameters = [...]; // Parameters of the method

$searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResults();

$mondialrelay->method->parameters; // Get last method called parameters
$mondialrelay->method->results; // Get last method called results
$mondialrelay->method->request()->results(); // Create another request using last method and parameters called and get the results
```

### Parameters

The parameters you pass throught the method are automatically checked based on Mondial Relay regex patterns.

Postal code parameters and phone numbers parameters are automatically checked depending the country parameter they depends on.

#### Get setted parameters

You can check the setted parameters of the last method you called using:

```php
$mondialrelay = new Webservice('BDTEST13', 'PrivateK');

// E.g. Call a method
$parameters = [...]; // Parameters of the method
$searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResults();

print_r($mondialrelay->method->parameters);
```

#### Get error parameters

If at least one of your parameter doesn't match its regex patterns during the parameters checking, an exception will be thrown to prevent useless webservice call.

You could retrieve these errors:

```php
$mondialrelay = new Webservice('BDTEST13', 'PrivateK');

// E.g. Call a method
$parameters = ['Pays' => "FRA"]; // Parameters of the method with at least a bad parameter

// Display parameters with error
try {
    $searchParcelshop = $mondialrelay->searchParcelshop($parameters)->getResults();
} catch (Exception $e) {
    print_r($mondialrelay->method->parameter->getErrors());
}

/*
Array
(
    [Pays] => FRA
)
*/
```

## Documentation

- [Mondial Relay Web Service v5.6](https://www.mondialrelay.fr/media/108937/Solution-Web-Service-V5.6.pdf)

## Tests

```
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php
```

If you want to test something specific, just add the filename you want to test.

Example:

```
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/WebserviceTest.php
```
