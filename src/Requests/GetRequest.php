<?php

declare(strict_types=1);

namespace Json\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request as BaseRequest;

class GetRequest extends BaseRequest
{
    /**
     * HTTP Method
     */
    protected Method $method = Method::GET;

    /**
     * Request path
     */
    protected string $path;

    /**
     * Request query parameters
     */
    protected array $queryParams;

    /**
     * Create a new request instance
     */
    public function __construct(string $path, ?array $queryParams = null)
    {
        $this->path = $path;
        $this->queryParams = $queryParams ?? [];
    }

    /**
     * Resolve the endpoint
     */
    public function resolveEndpoint(): string
    {
        return $this->path;
    }

    /**
     * Resolve the query parameters
     */
    public function resolveQueryParams(): array
    {
        return $this->queryParams ?? [];
    }
}
