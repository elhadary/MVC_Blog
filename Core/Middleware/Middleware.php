<?php

namespace app\Core\Middleware;

use app\Core\Middleware\Authenticated;
use DI\Container;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class,
        'admin' => Admin::class,
        'user' => User::class
    ];

    public static function resolve($key)
    {
        $c = new Container();
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        ($c->get($middleware))->handle();

    }


}