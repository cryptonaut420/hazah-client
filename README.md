A Laravel package for applications that wish to use Tokenpass for user authentication.

# Installation


### Add the Laravel package via composer

```
composer require tokenly/tokenpass-client
```





### Configuration

Install the views by running this command:
```
artisan tokenpass:make-auth
```

Set the following environment variables.  You will need a client id and client secret generated by Tokenpass.
```
TOKENPASS_CLIENT_ID="123456789"
TOKENPASS_CLIENT_SECRET=Kyours3c4etKeYH3re23mste0xmPdSja36aXLd02
TOKENPASS_PROVIDER_HOST=https://tokenpass.tokenly.com
```

The application container must resolve the following contract:
- `TokenpassUserRespositoryContract` (defaults to `App\Repositories\UserRepository`).  You can use the Tokenly\TokenpassClient\Concerns\FindsByTokenpassUuid trait to implement the lookup by tokenly uuid.

