<?php

class Router
{
  private array $routes = [
    'GET'  => [],
    'POST' => [],
  ];

  /* ---------- REGISTER ROUTES ---------- */

  public function get(string $path, string $action): void
  {
    $this->routes['GET'][$this->normalize($path)] = $action;
  }

  public function post(string $path, string $action): void
  {
    $this->routes['POST'][$this->normalize($path)] = $action;
  }

  /* ---------- DISPATCH ---------- */

  public function dispatch(string $uri, string $method): void
  {
    $uri = $this->normalize($uri);

    if (!isset($this->routes[$method][$uri])) {
      http_response_code(404);
      echo "404 Not Found: {$uri}";
      return;
    }

    [$controller, $action] = explode('@', $this->routes[$method][$uri]);

    $controllerFile = __DIR__ . '/../Controllers/' . $controller . '.php';

    if (!file_exists($controllerFile)) {
      die("Controller file not found: {$controllerFile}");
    }

    require_once $controllerFile;

    if (!class_exists($controller)) {
      die("Controller class not found: {$controller}");
    }

    $instance = new $controller();

    if (!method_exists($instance, $action)) {
      die("Method {$action} not found in {$controller}");
    }

    $instance->$action();
  }

  /* ---------- HELPERS ---------- */

  private function normalize(string $path): string
  {
    return '/' . trim($path, '/');
  }
}
