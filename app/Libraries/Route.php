<?php
/**
 * Created by PhpStorm.
 * User: spbaniya
 * Date: 11/21/16
 * Time: 9:20 AM.
 */

namespace app\Libraries;

class Route
{
    public static function get($route, $callable)
    {
        self::generateRoute($route, $callable);
    }

    public static function generateRoute($route, $callable)
    {
        global $app;
        $container = $app->getContainer();
        if (is_string($callable)) {
            $parts = explode(':', $callable);
            $controller = $parts[0];
            $method = !empty($parts[1]) ? $parts[1] : 'index';

            $app->get($route, $controller.':'.$method);

            $container[$controller] = function ($container) use ($controller) {
                require __DIR__.'/../../app/Controllers/'.$controller.'.php';
                $controller = '\\App\\Controllers\\'.$controller;

                return new $controller($container['renderer']);
            };
        }
    }

    public static function post($route, $callable)
    {
        self::generateRoute($route, $callable);
    }

    public static function put($route, $callable)
    {
        self::generateRoute($route, $callable);
    }

    public static function patch($route, $callable)
    {
        self::generateRoute($route, $callable);
    }

    public static function delete($route, $callable)
    {
        self::generateRoute($route, $callable);
    }
}
