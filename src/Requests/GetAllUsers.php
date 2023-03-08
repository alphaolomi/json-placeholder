<?php
declare(strict_types=1);

namespace Json\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class GetAllUsers extends Request  implements HasBody
{
    use HasJsonBody;

    private string $pathEndpoint = '/users';

    /**
     * HTTP Method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * Resolve the endpoint
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return $this->pathEndpoint;
    }
}
