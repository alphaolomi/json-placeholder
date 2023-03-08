# Json Placeholder API for PHP

> Built with [Saloon v2](https://github.com/sammyjo20/saloon).

## Available Requests

- `Json\Requests\GetAllUsers`

## Installation

Use Composer to install this SDK

```
composer require alphaolomi/json-api
```

## Usage

```php
<?php

use Json\Requests\GetAllUsers;

$api = new Json\Api();

$response = $api->send(new GetAllUsers);
```

Shorthand

```php
$users =  (new Json\Api())->send(new Json\Requests\GetAllUsers)->json();
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
<?php

use Json\Requests\GetAllUsers;

$api = new Json\Api();

$results = $api->paginator(new GetAllUsers);

foreach($results as $result) {
    // Handle result
}
```
