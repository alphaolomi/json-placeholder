<?php

namespace Json\Resources;

use Json\Requests\DeleteRequest;
use Json\Requests\GetRequest;
use Json\Requests\PostRequest;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Connector;

/**
 * @property Connector $connector
 */
class UsersResource extends Resource
{
    public function __construct(
        protected Connector $connector,
    ) {}

    public function list(int $page = 1)
    {
        $page = max($page, 1);

        $data = (array) $this->connector->send(
            request: new GetRequest('/users', ['_page' => $page])
        )->json();

        return $data;
    }

    /**
     * Iterate over a paginated request
     *
     * ```php
     * $api = new Json\Api();
     * $users = $api->users();
     * foreach ($users as $user) {
     *    // do something with $user
     * }
     * ```
     *
     * ```php
     * $api = new Json\Api();
     * $data =  $api->users()->paginate(function ($connector, $request, $response) {
     *   do{
     *    $nextLink = $response->headers()->get('Links')['next'] ?? null;
     *   // get the _page and _limit from the $nextLink
     *  if ($nextLink  !== null) {
     *     $nextUrl = parse_url($nextLink);
     *    parse_str($nextUrl['query'], $nextQuery);
     *   $request->query()->merge($nextQuery);
     * }
     * }while($response->headers()->get('Links')['next'] ?? null);
     * });
     * foreach ($data as $user) {
     *   // do something with $user
     * }
     * ````
     *
     * @param  \Saloon\Contracts\Request  $request
     * @param  bool  $asResponse
     * @return \Generator
     *
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function paginate(int $page = 1, ?callable $using = null)
    {
        $page = max($page, 1);
        if ($using === null) {
            $request = new GetRequest('/users', ['_page' => $page]);
            $response = $this->connector->send($request);

            return $using($this->connector, $request, $response);
        }

        do {
            $request = new GetRequest('/users', ['_page' => $page]);

            $response = $this->connector->send($request);
            yield from $response->json();

            if ($using !== null) {
                $using($this->connector, $request, $response);
            }

            $nextLink = $response->headers()->get('Links')['next'] ?? null;
            // get the _page and _limit from the $nextLink
            if ($nextLink !== null) {
                $nextUrl = parse_url($nextLink);
                parse_str($nextUrl['query'], $nextQuery);
                $request->query()->merge($nextQuery);
            }
        } while ($nextLink !== null);
    }

    /**
     * @throws RequestException
     */
    public function get(string $id): array
    {
        $data = (array) $this->connector
            ->send(new GetRequest("/users/$id"))
            ->json();

        return $data;
    }

    /**
     * @throws RequestException
     */
    public function create(array $data)
    {
        $data = (array) $this->connector
            ->send(new PostRequest('/users', $data))
            ->json();

        return $data;
    }

    /**
     * @throws RequestException
     */
    public function update(string $id, array $data)
    {
        $data = (array) $this->connector
            ->send(new PostRequest("/users/$id", $data))
            ->json();

        return $data;
    }

    /**
     * @throws RequestException
     */
    public function delete(string $id)
    {
        $data = $this->connector->send(new DeleteRequest("/users/$id"))->json();

        return $data;
    }
}
