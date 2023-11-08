<?php

namespace Core\Middleware;

class Middleware 
{
    public const MAP = [
        'guest' => Guest::class,
        'auth'  => Auth::class
    ];

    public static function resolve($key)
    {
        if(!$key) {
            return;
        }
        // ?? false присваивает значение $middleware,
        // без этого $middleware может оказаться неопределенной переменной.
        $middleware = static::MAP[$key] ?? false;
        //dd($middleware); //проверка, если NULL
        // if NULL
        if(!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
}