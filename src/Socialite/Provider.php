<?php

namespace Cryptonaut420\HazahClient\Socialite;

use SocialiteProviders\Manager\OAuth1\AbstractProvider;
use SocialiteProviders\Manager\OAuth1\User;

class Provider extends AbstractProvider
{
    /**
     * Unique Provider Identifier.
     */
    public const IDENTIFIER = 'HAZAH';

    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user['extra'])->map([
            'id'       => $user['id'],
            'name'     => $user['name'],
            'username'     => $user['username'],            
            'email'    => $user['email'],
        ]);
    }
}
