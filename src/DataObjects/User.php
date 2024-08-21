<?php

declare(strict_types=1);

namespace Json\DataObjects;

class User
{
    public int $id;

    public string $name;

    public string $username;

    public string $email;

    public Address $address;

    public string $phone;

    public string $website;

    public Company $company;

    public function __construct(
        int $id,
        string $name,
        string $username,
        string $email,
        Address $address,
        string $phone,
        string $website,
        Company $company
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->website = $website;
        $this->company = $company;
    }
}
