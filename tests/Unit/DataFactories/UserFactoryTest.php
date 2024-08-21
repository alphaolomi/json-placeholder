<?php

use Json\DataFactories\UserFactory;
use Json\DataObjects\Address;
use Json\DataObjects\Company;
use Json\DataObjects\Geo;
use Json\DataObjects\User;

it('can create a new user', function () {
    $attributes = [
        'id' => 1,
        'name' => 'John Doe',
        'username' => 'johndoe',
        'email' => 'johndoe@example.com',
        'address' => new Address(
            street: '123 Street',
            suite: 'Suite 456',
            city: 'City',
            zipcode: '12345',
            geo: new Geo(lat: '40.123', lng: '-75.456'),
        ),
        'phone' => '123456789',
        'website' => 'johndoe.com',
        'company' => new Company(
            name: 'Doe Corp',
            catchPhrase: 'Doing it all',
            bs: 'enterprise solutions',
        ),
    ];

    $user = UserFactory::new($attributes);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->id)->toBe(1);
    expect($user->name)->toBe('John Doe');
    expect($user->username)->toBe('johndoe');
    expect($user->email)->toBe('johndoe@example.com');
    expect($user->address)->toBeInstanceOf(Address::class);
    expect($user->address->street)->toBe('123 Street');
    expect($user->address->suite)->toBe('Suite 456');
    expect($user->address->city)->toBe('City');
    expect($user->address->zipcode)->toBe('12345');
    expect($user->address->geo)->toBeInstanceOf(Geo::class);
    expect($user->address->geo->lat)->toBe('40.123');
    expect($user->address->geo->lng)->toBe('-75.456');
    expect($user->phone)->toBe('123456789');
    expect($user->website)->toBe('johndoe.com');
    expect($user->company)->toBeInstanceOf(Company::class);
    expect($user->company->name)->toBe('Doe Corp');
    expect($user->company->catchPhrase)->toBe('Doing it all');
    expect($user->company->bs)->toBe('enterprise solutions');
});

it('can create a collection of users', function () {
    $users = [
        [
            'id' => 1,
            'name' => 'John Doe',
        ],
        [
            'id' => 2,
            'name' => 'Jane Doe',
        ],
    ];

    $userCollection = UserFactory::collection($users);

    expect($userCollection)->toBeArray();
    expect($userCollection[0])->toBeInstanceOf(User::class);
    expect($userCollection[0]->id)->toBe(1);
    expect($userCollection[0]->name)->toBe('John Doe');
    expect($userCollection[1])->toBeInstanceOf(User::class);
    expect($userCollection[1]->id)->toBe(2);
    expect($userCollection[1]->name)->toBe('Jane Doe');
});
