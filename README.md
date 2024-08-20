# Json Placeholder for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alphaolomi/json-placeholder.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/json-placeholder)
[![Tests](https://img.shields.io/github/actions/workflow/status/alphaolomi/json-placeholder/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/alphaolomi/json-placeholder/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/alphaolomi/json-placeholder.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/json-placeholder)

A PHP SDK for the [JSON Placeholder API](https://jsonplaceholder.typicode.com/).


## Installation

You can install the package via composer:

```bash
composer require alphaolomi/json-placeholder
```

## Usage

```php
$api = new Json\Api();

$users = $api->users()->list();

foreach($users as $user) {
    echo $user->name;
}
```

Shorthand

```php
$users =  (new Json\Api())->users()->list();

print_r($users);

// array:10 [
//   0 => array:8 [
//     "id" => 1
//     "name" => "Leanne Graham"
//     "username" => "Bret"
//     "email" => "Sincere@april.biz"
//     "address" => array:5 [▶]
//     "phone" => "1-770-736-8031 x56442"
//     "website" => "hildegard.org"
//     "company" => array:3 [▶]
//   ]
//   1 => array:8 [▶]
// ]
```

## Paginated Results

You may prefer to retrieve all the results from the paginated requests by using the `paginator` method on the SDK.

```php
$api = new Json\Api();

$results = $api->users()->paginate();

foreach($results as $result) {
    // Handle result
    echo $result->name;
}
```


## Available Resources

- Users
    - List all users
    - Get a single user
    - Create a user
    - Update a user
    - Delete a user
    - Paginate users


## Testing


Using PestPHP Testing framework, run the following command to execute the tests.


```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alpha Olomi](https://github.com/alphaolomi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
