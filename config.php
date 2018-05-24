<?php

return [
    'users' => [
        'test' => [
            'password' => 'c0988d3ad2956cf8a0a1d252f30a1f0f', // ngJxC3h8
            'role' => 'user',
            'name' => 'Volodymyr Nakvasiuk'
        ],
        'admin' => [
            'password' => 'd8578edf8458ce06fbc5bb76a58c5ca4', // qwerty
            'role' => 'administrator',
            'name' => 'Vasyl Pupkin'
        ]
    ],
    'base_url' => '/',
    'templates_route' => __DIR__ . '/templates',
    'templates_user' => __DIR__.'/templates/user',
    'layout' => 'layout',
];