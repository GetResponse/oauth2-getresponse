# oauth2-getresponse

This package implements a [GetResponse OAuth 2.0](http://apidocs.getresponse.com/v3/oauth) provider for [thephpleague/oauth2-client](https://github.com/thephpleague/oauth2-client) library.

## Installation

Recommended way to install the package is by using composer:
```bash
composer require getresponse/oauth2-getresponse
```

## Usage

Basic provider construction:
```php
<?php

$provider = new \Getresponse\Oauth\Provider\Getresponse([
    'clientId' => 'CLIENT-ID',
    'clientSecret' => 'CLIENT-SECRET'
]);
```

It's also possible to set a custom domain and an API endpoint, which is useful when authorizing GetResponse 360 customers:
```php
<?php

$provider = new \Getresponse\Oauth\Provider\Getresponse([
    'clientId' => 'CLIENT-ID',
    'clientSecret' => 'CLIENT-SECRET',
    'domain' => 'https://custom-domain.getresponse360.com',
    'apiEndpoint' => 'https://api3.getresponse360.com'
]);
```

Please refer to the [oauth2-client documentation](https://github.com/thephpleague/oauth2-client/blob/master/README.md) for a full OAuth 2.0 flow example.

## Documentation
- [GetResponse API Docs](http://apidocs.getresponse.com/v3)
- [GetResponse OAuth 2.0 Reference](http://apidocs.getresponse.com/v3/oauth)
- [The PHP League's oauth2-client](https://github.com/thephpleague/oauth2-client)

## Running tests

To run unit tests, issue the following commands:
```bash
composer install
php vendor/bin/phpunit
```
