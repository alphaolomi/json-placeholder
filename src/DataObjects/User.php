<?php

declare(strict_types=1);

namespace Json\DataObjects;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

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

class Geo
{
	public string $lat;
	public string $lng;

	public function __construct(string $lat, string $lng)
	{
		$this->lat = $lat;
		$this->lng = $lng;
	}
}

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