<?php

use Json\DataFactories\UserFactory;
use Json\DataObjects\User;

it('can create a new user', function () {
    $attributes = [
        'id' => 1,
        'name' => 'John Doe',
        'username' => 'johndoe',
        'email' => 'johndoe@example.com',
        'address' => '123 Street, City',
        'phone' => '123456789',
        'website' => 'johndoe.com',
        'company' => 'Doe Corp',
    ];

    $user = UserFactory::new($attributes);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->id)->toBe(1);
    expect($user->name)->toBe('John Doe');
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
