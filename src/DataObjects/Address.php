<?php

declare(strict_types=1);

namespace Json\DataObjects;


class Address
{
    public string $street;

    public string $suite;

    public string $city;

    public string $zipcode;

    public Geo $geo;

    public function __construct(
        string $street,
        string $suite,
        string $city,
        string $zipcode,
        Geo $geo
    ) {
        $this->street = $street;
        $this->suite = $suite;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->geo = $geo;
    }
}


