<?php

namespace App\GraphQL\Mutations;

use Illuminate\Auth\AuthManager;
use Nuwave\Lighthouse\Exceptions\AuthenticationException;

use function Psy\debug;

final class AuthMutation
{
    protected $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function login($_, array $args)
    {
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password'],
        ];

        $userProvider = $this->authManager->createUserProvider('users');

        $authenticatable = $userProvider->retrieveByCredentials($credentials);

        if (!$authenticatable || !$userProvider->validateCredentials($authenticatable, $credentials)) {
            throw new AuthenticationException('The provided credentials do not match our records.');
        }

        /** @var \Laravel\Sanctum\HasApiTokens $user */
        $user = $authenticatable;

        return [
            'token' => $user->createToken(env('APP_NAME'))->plainTextToken,
        ];
    }
}
