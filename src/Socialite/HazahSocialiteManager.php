<?php

namespace Cryptonaut420\HazahClient\Socialite;

use Laravel\Socialite\SocialiteManager;

class HazahSocialiteManager extends SocialiteManager
{

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createHazahDriver()
    {
        $config = $this->app['config']['hazah'];

        return $this->buildProvider(
            'Cryptonaut420\HazahClient\Socialite\Two\HazahProvider', $config
        );
    }

    /**
     * Build an OAuth 2 provider instance.
     *
     * @param  string  $provider
     * @param  array  $config
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    public function buildProvider($provider, $config)
    {
      if(!isset($config['redirect_uri']) AND isset($config['redirect'])){
        $config['redirect_uri'] = $config['redirect'];
      }
      $provider = new $provider(
          $this->app['request'], $config['client_id'],
          $config['client_secret'], $config['redirect_uri']
      );

      if(isset($config['hazah_url'])){
        $provider->setBaseURL($config['hazah_url']);
      }

      return $provider;
    }

    /**
     * Get the default driver name.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return 'hazah';
    }

}
