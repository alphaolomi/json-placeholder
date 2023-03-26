# Json Placeholder API for PHP

[![Built with](https://img.shields.io/badge/built%20with-Saloon%20v2-blue)](https://github.com/sammyjo20/saloon)[![Tests](https://github.com/alphaolomi/json-placeholder/actions/workflows/tests.yml/badge.svg)](https://github.com/alphaolomi/json-placeholder/actions/workflows/tests.yml) [![Fix PHP code style issues](https://github.com/alphaolomi/json-placeholder/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/alphaolomi/json-placeholder/actions/workflows/fix-php-code-style-issues.yml)

<br>

A PHP SDK for the [JSON Placeholder API](https://jsonplaceholder.typicode.com/).




## Installation

Use Composer to install this SDK

```
composer require alphaolomi/json-api
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

Using Pest Testing Framework, run the following command to run the tests.

```
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Alpha Olomi](https://github.com/alpaholomi) 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.