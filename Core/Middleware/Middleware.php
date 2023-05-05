<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middlewware = static::MAP[$key] ?? false;

        if (!$middlewware) {
            throw new \Exception('No matching middleware found for key ' . $key);
        }

        (new $middlewware)->handle();
    }
}
