<?php

namespace protected;

class Router
{
    public string $request;
    public array $routes = [];

    public function __construct(array $request)
    {
        $this->request = basename($request['REQUEST_URI']);
    }

    public function addRoute(string $uri, \Closure $callback): void
    {
        $this->routes[$uri] = $callback;
    }

    public function match(string $uri): bool
    {
        return array_key_exists($uri, $this->routes);
    }

    public function run(): void
    {
        if ($this->match($this->request)) {
            $this->routes[$this->request]->call($this);
        }
    }
}