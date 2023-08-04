<?php

namespace SimlpyDi\SimplyDi;

class Container
{
    private static $services = [];

    public static function register(string $name, callable $factory)
    {
        self::$services[$name] = $factory;
    }

    public static function resolve(string $name)
    {
        if (isset(self::$services[$name])) {
            $factory = self::$services[$name];
            return $factory();
        }

        throw new \Exception("Service '$name' not found in the DI container.");
    }
}
