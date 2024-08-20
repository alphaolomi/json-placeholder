<?php

declare(strict_types=1);

namespace Json;

use Json\Responses\ApiResponse;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class Api extends Connector
{
    use AlwaysThrowOnErrors;

    protected ?string $apiKey = null;

    protected ?string $baseUrl = 'https://jsonplaceholder.typicode.com';

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = $apiKey ?? $this->apiKey;
        $this->baseUrl = $baseUrl ?? $this->baseUrl;
    }

    /**
     * Define the custom response
     */
    protected ?string $response = ApiResponse::class;

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Define default headers
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultQuery(): array
    {
        return [
            '_page' => 1, // &_page=1
        ];
    }

    public function users(): Resources\UsersResource
    {
        return new Resources\UsersResource($this);
    }
}
