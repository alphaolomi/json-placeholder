<?php

declare(strict_types=1);

use Saloon\Contracts\PendingRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

function mockClient(): MockClient
{
    return new MockClient([
        '*' => function (PendingRequest $pendingRequest) {
            $endpoint = $pendingRequest->getRequest()->resolveEndpoint();
            $method = $pendingRequest->getMethod()->value;

            return MockResponse::fixture(implode('/', [$endpoint, $method]));
        },
    ]);
}
function something()
{
    // ..
}
