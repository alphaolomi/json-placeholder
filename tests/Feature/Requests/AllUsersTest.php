<?php

declare(strict_types=1);

use Json\Api;
use Json\Requests\GetAllUsers;
use Json\Responses\ApiResponse;

test('can retrieve all items from the api', function () {
    $api = new Api();
    $response = $api->send(new GetAllUsers);
    $this->assertInstanceOf(ApiResponse::class, $response);
});

test('can request an iterator', function () {
    $api = new Api();
    $iterator = $api->paginator(new GetAllUsers);
    $all = [];
    foreach ($iterator as $item) {
        $all[] = $item;
    }
    $this->assertCount(10, $all);
});
