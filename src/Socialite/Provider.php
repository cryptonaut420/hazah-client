<?php

namespace Cryptonaut420\HazahClient\Socialite;

use SocialiteProviders\Manager\OAuth2\AbstractProvider;
use SocialiteProviders\Manager\OAuth2\User;

class Provider extends AbstractProvider
{
    /**
     * Unique Provider Identifier.
     */
    public const IDENTIFIER = 'HAZAH';

    /**
       * {@inheritdoc}
       */
      protected $scopes = ['user', 'tca'];

      /**
       * {@inheritdoc}
       */
      protected function getAuthUrl($state)
      {
          return $this->buildAuthUrlFromBase(
              env('HAZAH_PROVIDER_HOST').'/oauth/authorize',
              $state
          );
      }

      /**
       * {@inheritdoc}
       */
      protected function getTokenUrl()
      {
          return env('HAZAH_PROVIDER_HOST').'/oauth/token';
      }

      /**
       * {@inheritdoc}
       */
      protected function getUserByToken($token)
      {
          $response = $this->getHttpClient()->get(
              env('HAZAH_PROVIDER_HOST').'/oauth-api/user-info',
              [
                  'query' => [
                      'access_token' => $token,
                  ],
              ]
          );

          return json_decode($response->getBody()->getContents(), true);
      }

      /**
       * {@inheritdoc}
       */
      protected function mapUserToObject(array $user)
      {
          $user = $user['data'];

          return (new User())->setRaw($user)->map([
              'id'       => $user['id'],
              'email'    => $user['email'],
              'username'    => $user['username']
          ]);
      }

      /**
       * {@inheritdoc}
       */
      protected function getTokenFields($code)
      {
          return array_merge(parent::getTokenFields($code), [
              'grant_type' => 'authorization_code',
          ]);
      }
}
