<?php

namespace Cryptonaut420\HazahClient\Socialite;

use SocialiteProviders\Manager\SocialiteWasCalled;

class HazahExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('hazah', Provider::class, Server::class);
    }
}
