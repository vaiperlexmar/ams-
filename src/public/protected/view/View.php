<?php

namespace Views;

use protected\exceptions\ViewNotFoundException;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    public static function make(string $view, array $params = []): View
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $viewPath = VIEW_PATH . $this->view . '.php';

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException('View file not found: ' . $viewPath);
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include VIEW_PATH . $this->view . ".php";

        return (string)ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}