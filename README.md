# SIM-ASN PHP Client

This is php client SDK for SIM-ASN BKPSDM Kabupaten Karawang api services

## Installation
require this package via composer

```
composer require bkpsdm-karawang/sim-asn-php-client
```
add environment value to `.env`
```env
SIM_ASN_CLIENT_ID=xxxx
SIM_ASN_CLIENT_SECRET=xxxx
```
We recomend add two field to user table
```php
    $table->uuid('sim_asn_user_id')->nullable()->default(null);
    $table->json('sim_asn_token')->nullable()->default(null);
```
Add refresh token handler in boot of `AppServiceProvider.php`
```php
    use SIM_ASN\Laravel\Facades\UserClient;
    use SIM_ASN\Models\AccessToken;
    ...
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $user = $request->user();

        if ($user) {
            if ($user->sim_asn_token) {
                UserClient::setAccessToken($user->sim_asn_token);
            }

            UserClient::onRefreshToken(function(AccessToken $accessToken) use ($user) {
                $user->sim_asn_token = $accessToken;
                $user->save();
            });
        }
    }
```
## Usage
Create callback handler route
```php
    use SIM_ASN\Laravel\Facades\OauthClient;
    use SIM_ASN\Models\AccessToken;
    use SIM_ASN\Models\User as UserSimASN;

    /**
     * callback sim-asn
     */
    public function callbackSimASN(Request $request)
    {
        return OauthClient::handleCallback($request, function (UserSimASN $userSimASN, AccessToken $token) {
            $user = User::whereSimAsnUserId($userSimASN->id)->first();

            if ($user) {
                $user->sim_asn_token = $token;
                $user->save();
                return Auth::login($user);
            }

            return null;
        });
    }
```
Manualy get access token by response code
```php
$accessToken = OauthClient::requestAccessToken($request->code);
```
Get user profile
```php
$user = UserClient::setAccessToken($accessToken)->getUser();
```
App Client or User Client is extended class from guzzle client so you can directly use http guzzle client
```php
use SIM_ASN\Laravel\Facades\AppClient;
...
AppClient::get('/api/endpoint');
AppClient::post('/api/endpoint', [
    'body' => ['foo' => 'bar']
]);
```
