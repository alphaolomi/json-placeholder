<?php

declare(strict_types=1);

namespace Json\DataObjects;

class Company
{
    public string $name;

    public string $catchPhrase;

    public string $bs;

    public function __construct(
        string $name,
        string $catchPhrase,
        string $bs
    ) {
        $this->name = $name;
        $this->catchPhrase = $catchPhrase;
        $this->bs = $bs;
    }
}
