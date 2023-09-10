<?php

namespace Blog\Core\Router;

use Blog\Core\Router\ModelBinding;

class Router
{
    private $routes = [];

    public function get($uri, $callback)
    {
        $this->addRoute('GET', $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->addRoute('POST', $uri, $callback);
    }

    private function addRoute($method, $uri, $callback)
    {
        $formattedUri = $this->formatUri($uri);
        $this->routes[$method][$formattedUri] = $callback;
    }

    private function formatUri($uri)
    {
        $uri = ltrim($uri, '/');
        $formattedUri = preg_replace('/{([^}]+)}/', '(?P<$1>[^/]+)', $uri);
        $formattedUri = str_replace('/?(', '/(', $formattedUri);
        return '@^' . $formattedUri . '$@i';
    }

    public function dispatch($method, $uri)
    {
        $uri = ltrim($uri, '/');

        foreach ($this->routes[$method] as $routePattern => $callback) {
            if (preg_match($routePattern, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $this->executeCallback($callback, $params);
                return; // Once we've found our route, we can return
            }
        }

        // No match route
        $this->handleNoMatch();
    }

    private function executeCallback($callback, $params)
    {
        if (is_callable($callback)) {
            call_user_func($callback, ...$params);
        } elseif (is_array($callback)) {
            $this->executeArrayCallback($callback, $params);
        } else {
            throw new \Exception('Routers should be either a callable or an array in [class, method] format');
        }
    }

    private function executeArrayCallback($callback, $params)
    {
        [$class, $method] = $callback;

        if (!class_exists($class)) {
            throw new \Exception("Class $class does not exist");
        }

        if (!method_exists($class, $method)) {
            throw new \Exception("Method $method does not exist in class $class");
        }

        $controller = new $class;

        // Invoke the method and pass in necessary parameters
        $controller->$method(...$this->resolveModel($params));
    }

    private function handleNoMatch()
    {
        header("HTTP/1.1 404 Not Found");
        echo '404: Page not found.';
    }

    private function resolveModel($params)
    {
        // Fetch model based on parameter name
        $models = array_map(function ($value, $key) {
            $modelClass = (new ModelBinding)->getModelClass($key);

            // Only resolve if the model class is found
            if (!empty($modelClass)) {
                // Here fetch corresponding model instance, replace with actual data fetching code
                $model = (new $modelClass)->find($value);

                // if model is not found, throw an exception
                if (!$model) {
                    echo 'Model not found';
                    exit();
                }

                return $model;
            }
        }, $params, array_keys($params));

        return $models;
    }
}
