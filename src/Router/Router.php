<?php

namespace Blog\Router;

class Router {
    private $routes = [];

    public function get($uri, $callback)
    {
        $this->add('GET', $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->add('POST', $uri, $callback);
    }

    public function add($method, $uri, $callback)
    {
        $uri = ltrim($uri, '/');
        $formattedUri = preg_replace('/{([^}]+)}/', '(?P<$1>[^/]+)', $uri);
        $formattedUri = str_replace('/?(', '/(', $formattedUri);
        $formattedUri = '@^' . $formattedUri . '$@i';
        $this->routes[$method][$formattedUri] = $callback;
    }


    public function dispatch($method, $uri)
    {
        $uri = ltrim($uri, '/');

        foreach ($this->routes[$method] as $routePattern => $callback) {
            if (preg_match($routePattern, $uri, $matches)) {
                // Get associative array
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (is_callable($callback)) {
                    call_user_func($callback, ...$params);
                } elseif (is_array($callback)) {
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
                } else {
                    throw new \Exception('Routers should be either a callable or an array in [class, method] format');
                }

                return; // Once we've found our route, we can return
            }
        }

        // No match route
        header("HTTP/1.1 404 Not Found");
        echo '404: Page not found.';
    }

    private function resolveModel($params)
    {
        // Fetch model based on parameter name
        $models = array_map(function ($value, $key) {
            $modelClass = ModelBinding::getModelClass($key);

            // Only resolve if the model class is found
            if (!empty($modelClass)) {
                // Here fetch corresponding model instance, replace with actual data fetching code
                $model = (new $modelClass)->find($value);

                // if model is not found, throw an exception
                if (!$model) {
                    throw new \Exception("Model $modelClass not found");
                }

                return $model;
            }
        }, $params, array_keys($params));

        return $models;
    }
}