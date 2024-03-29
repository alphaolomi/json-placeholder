<?php

declare(strict_types=1);

namespace Json\DataFactories;

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
            return self::new($user);
        }, $users);
    }
}
