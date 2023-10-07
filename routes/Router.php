<?php

class Router
{
    private static array $list = [];

    public static function get(string $page, Closure $closure) // GET route
    {
        self::$list[] = [
            'page' => $page,
            'method' => 'GET',
            'logic' => $closure
        ];
    }

    public static function post(string $page, Closure $closure) // POST route
    {
        self::$list[] = [
            'page' => $page,
            'method' => 'POST',
            'logic' => $closure
        ];
    }

    public static function put(string $page, Closure $closure) // POST route
    {
        self::$list[] = [
            'page' => $page,
            'method' => 'PUT',
            'logic' => $closure
        ];
    }

    public static function patch(string $page, Closure $closure) // POST route
    {
        self::$list[] = [
            'page' => $page,
            'method' => 'PATCH',
            'logic' => $closure
        ];
    }

    public static function delete(string $page, Closure $closure) // POST route
    {
        self::$list[] = [
            'page' => $page,
            'method' => 'DELETE',
            'logic' => $closure
        ];
    }

    public static function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $page = trim($_SERVER['REQUEST_URI'], '/');

        // foreach (self::$list as $item) {
        //     if ($item['page'] === $page && $item['method'] === $method) {
        //         $item['logic']();
        //         return;
        //     }
        // }
        foreach (self::$list as $item) {
            $pattern = self::buildPattern($item['page']);

            if ($method === $item['method'] && preg_match($pattern, $page, $matches)) {
                array_pop($matches);
                array_shift($matches);
                $item['logic'](...$matches); // Call the closure with captured parameters
                return;
            }
        }

        die('Not found');
    }

    private static function buildPattern(string $page): string
    {
        // Convert route parameters enclosed in {} to regular expression capture groups
        $pattern = preg_replace_callback('/\{([a-zA-Z0-9_]+)\}/', function ($matches) {
            return "(?P<{$matches[1]}>[\w-]+)";
        }, $page);

        // Add delimiters and make it a full match pattern
        return '#^' . $pattern . '$#';
    }
}
