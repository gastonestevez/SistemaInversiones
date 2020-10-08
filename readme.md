## SistemaInversiones Project


### <i>Dev Area</i>
#### Api-Token steps
- Require jwt-auth package with composer

    <code>
    composer require tymon/jwt-auth:dev-develop --prefer-source
    </code>

- Add Service provider in *config/app.php*

    <code>
    'providers' => [
        Tymon\JWTAuth\Providers\LaravelServiceProvider::class
    ],
    </code>

- Generate JWT KEY in *.env* file.

    <code>
    php artisan jwt:secret
    </code>

- Add Middlewares to */app/Http/Kernel.php*

    <code>
        'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
        'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
    </code>

- Model data on: https://medium.com/@experttyce/c%C3%B3mo-crear-un-api-rest-con-laravel-5-7-y-jwt-token-94b79c533c6d


