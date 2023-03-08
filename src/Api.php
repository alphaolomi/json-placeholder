<?php

declare(strict_types=1);

namespace Json;

use Generator;
use Saloon\Http\Connector;
use Saloon\Contracts\Request;
use Json\Responses\ApiResponse;

class Api extends Connector
{
    /**
     * Define the custom response
     *
     */
    protected ?string $response = ApiResponse::class;

    /**
     * Resolve the base URL of the service.
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return 'https://jsonplaceholder.typicode.com/';
        // return 'http://localhost:3000/';
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

    /**
     * Iterate over a paginated request
     *
     * @param \Saloon\Contracts\Request $request
     * @param bool $asResponse
     * @return \Generator
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function paginator(Request $request, bool $asResponse = false): Generator
    {
        do {
            // send the request
            $response = $this->send($request);
            // if we want the response, yield it
            yield from $response->json();
            // get the next link from the Links header
            $nextLink = $response->headers()->get('Links')['next'] ?? null;
            // get the _page and _limit from the $nextUrl
            if ($nextLink  !== null) {
                $nextUrl = parse_url($nextLink);
                parse_str($nextUrl['query'], $nextQuery);
                // set the next page in the query
                $request->query()->merge($nextQuery);
            }
        } while ($nextLink !== null);
    }
}
