<?php

namespace Core;

class App {
    protected static $container;

    // задать контейнер
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    // получить контейнер
    public static function container()
    {
        return static::$container;
    }

    // Эта штука - аналог resolve() ниже.
    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    // Эта штука создана, чтобы App вызывал собственный метод resolve,
    // но через себя он будет вызывать метод resolve другого класса (Container).
    // Призвано подменить вот эту строчку в конечных файлах контроллера:
    // $db = App::container()->resolve(\Core\Database::class);
    // и использовать свою - App::resolve(Database::class);
    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}

