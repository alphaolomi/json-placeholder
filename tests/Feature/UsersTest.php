<?php

declare(strict_types=1);

use Json\Api;
use Saloon\Helpers\MockConfig;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

beforeEach(function () {
    MockConfig::setFixturePath('tests/Fixtures');
    /** @var Saloon\Http\Faking\MockClient */
    $this->mockClient = new MockClient([]);
    /** @var Json\Api */
    $this->api = new Api();
    $this->api->withMockClient($this->mockClient);
});

it('can instantiate Api class', function () {
    expect($this->api)->toBeInstanceOf(Api::class);
});

it('can list users', function () {
    $this->mockClient->addResponse(MockResponse::fixture('users.index'));
    $response = $this->api->users()->list();
    expect($response)->toBeArray();
});

it('can create a user', function () {
    $this->mockClient->addResponse(MockResponse::fixture('users.create'));
    $userStr = <<<'JSON'
{
    "name": "Leanne Graham",
    "username": "Bret",
    "email": "Sincere@april.biz",
    "address": {
        "street": "Kulas Light",
        "suite": "Apt. 556",
        "city": "Gwenborough",
        "zipcode": "92998-3874",
        "geo": { "lat": "-37.3159", "lng": "81.1496" } 
    },
    "phone": "1-770-736-8031 x56442",
    "website": "hildegard.org",
    "company": {
        "name": "Romaguera-Crona",
        "catchPhrase": "Multi-layered client-server neural-net",
        "bs": "harness real-time e-markets"
    }
}
JSON;
    $response = $this->api->users()->create(json_decode($userStr, true));
    expect($response)->toBeArray();
});

it('can get a user', function () {
    $this->mockClient->addResponse(MockResponse::fixture('users.show'));
    $response = $this->api->users()->get((string) 1);
    expect($response)->toBeArray();
});

// delete
it('can delete a user', function () {
    $this->mockClient->addResponse(MockResponse::fixture('users.delete'));
    $response = $this->api->users()->delete((string) 2);
    expect($response)->toBeArray();
})->skip('Not implemented yet');
