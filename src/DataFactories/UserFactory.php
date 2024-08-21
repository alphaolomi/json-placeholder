<?php

declare(strict_types=1);

namespace Json\DataFactories;

use Json\DataObjects\Address;
use Json\DataObjects\Company;
use Json\DataObjects\Geo;
use Json\DataObjects\User;

final class UserFactory
{
    public static function new(array $attributes): User
    {
        return (new self)->make(
            attributes: $attributes,
        );
    }

    public function make(array $attributes): User
    {
        return new User(
            $attributes['id'],
            $attributes['name'],
            $attributes['username'],
            $attributes['email'],
            $attributes['address'],
            $attributes['phone'],
            $attributes['website'],
            $attributes['company']
        );
    }

    public static function collection(array $users)
    {
        return array_map(function ($user) {
            return self::new([
                'id' => $user['id'],
                'name' => $user['name'],
                'username' => $user['username'] ?? '',
                'email' => $user['email'] ?? '',
                'address' => new Address(
                    street: $user['address']['street'] ?? '',
                    suite: $user['address']['suite'] ?? '',
                    city: $user['address']['city'] ?? '',
                    zipcode: $user['address']['zipcode'] ?? '',
                    geo: new Geo(
                        lat: $user['address']['geo']['lat'] ?? '',
                        lng: $user['address']['geo']['lng'] ?? '',
                    ),
                ),
                'phone' => $user['phone'] ?? '',
                'website' => $user['website'] ?? '',
                'company' => new Company(
                    name: $user['company']['name'] ?? '',
                    catchPhrase: $user['company']['catchPhrase'] ?? '',
                    bs: $user['company']['bs'] ?? '',
                ),
            ]);
        }, $users);
    }
}
