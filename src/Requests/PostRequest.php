<?php

declare(strict_types=1);

namespace Json\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request as BaseRequest;
use Saloon\Traits\Body\HasJsonBody;

class PostRequest extends BaseRequest implements HasBody
{
    use HasJsonBody;

    /**
     * HTTP Method
     */
    protected Method $method = Method::POST;

    /**
     * Request path
     */
    protected string $path;

    /**
     * Request payload
     *
     * @var array
     */
    protected ?array $data;

    /**
     * Create a new request instance
     *
     * @param  ?array  $data
     */
    public function __construct(string $path, ?array $data = null)
    {
        $this->path = $path;
        $this->data = $data ?? [];
    }

    /**
     * Resolve the endpoint
     */
    public function resolveEndpoint(): string
    {
        return $this->path;
    }

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->data ?? [];
    }
}
