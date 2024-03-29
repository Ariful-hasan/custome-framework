<?php

namespace App\lib;

class Request
{
    private array $routeParams = [];

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

   public function getUrl(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    public function getBody(): array
    {
        $data = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }

    public function getRouteParams(): array
    {
        return $this->routeParams;
    }

    public function getRouteParam($param, $default = null)
    {
        return $this->routeParams[$param] ?? $default;
    }

    /**
     * @param $params
     * @return self
     */
    public function setRouteParams($params)
    {
        $this->routeParams = $params;
        return $this;
    }

    public function only(array $keys): array
    {
        return array_filter(
            $this->getBody(),
            static fn (string $key) => in_array($key, $keys, true),
            ARRAY_FILTER_USE_KEY
        );
    }

    public function except(array $keys): array
    {
        return array_filter(
            $this->getBody(),
            static fn (string $key) => !in_array($key, $keys, true),
            ARRAY_FILTER_USE_KEY
        );
    }
}