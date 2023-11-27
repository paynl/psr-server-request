# PSR Server Request

[![Static Code Analysis](https://github.com/paynl/psr-server-request/actions/workflows/code-analysis.yaml/badge.svg)](https://github.com/paynl/psr-server-request/actions/workflows/code-analysis.yaml)
[![PHPUnit tests](https://github.com/paynl/psr-server-request/actions/workflows/phpunit.yaml/badge.svg)](https://github.com/paynl/psr-server-request/actions/workflows/phpunit.yaml)
[![Coverage Status](https://coveralls.io/repos/github/paynl/psr-server-request/badge.svg?branch=feature/psr-server-request-package)](https://coveralls.io/github/paynl/psr-server-request?branch=feature/psr-server-request-package)

This package adds a helper function to create a PSR Server Request from the Global PHP variables.

## Requirements

To install this package you need:

* PHP >= 7.4;
* composer.

## Installation

```
composer require paynl/psr-server-request
```

This will install the package into your project and autoload the helper function.

## Usage

To create a PSR Server Request from the PHP Globals you can use the following method:
```php
$serverRequest = create_psr_server_request();
```