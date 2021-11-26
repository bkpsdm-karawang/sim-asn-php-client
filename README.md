# SIM-ASN PHP Client

This is php client for SIM-ASN BKPSDM Kabupaten Karawang api services

## Installation
require this package via composer

```
composer require bkpsdm-karawang/sim-asn-php-client
```
### Larvel Installation
Add service provider to `config/app.php`
```php
SIM_ASN\Laravel\Providers\LaravelServiceProvider::class,

```
Publish config with run:

```
php artisan vendor:publish --provider="SIM_ASN\Laravel\Providers\LaravelServiceProvider" --tag="config"

```
### Lumen Installation
Add service provider to `bootstrap/app.php`
```php
$app->register(SIM_ASN\Laravel\Providers\LumenServiceProvider::class);
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
This method will automaticly return redirect response to the frontend based on state you defined, create redirect with state in `config/sim-asn.php`
```php
    'user_redirect_state' => [
        'login' => env('FRONTEND_URL').'/login',
        'register' => env('FRONTEND_URL').'/register',
        'connect' => env('FRONTEND_URL').'/profile'
    ],
```
Manualy get access token by response code
```php
$accessToken = OauthClient::requestAccessToken($request->code);
```
Get user profile
```php
$user = UserClient::setAccessToken($accessToken)->getUser();
```
