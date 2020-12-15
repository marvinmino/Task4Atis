<?php

namespace App\Core;
use AdminMiddleware;    
use AuthMiddleware;
class Router
{

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {

        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType,$requestInput)
    {


        if (array_key_exists($uri, $this->routes[$requestType])) {

            return $this->callAction(
               $requestInput, ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new \Exception('No route defined for this URI');
    }

    protected function callAction($requestInput,$controller, $action, $middleware,$admin)
    {$controller = "App\\Controllers\\{$controller}";
        $check=new AdminMiddleware();

        if($middleware == "" || !AuthMiddleware::$middleware()){
            if($admin == "" || !$check->$admin()){

        $controller = new $controller($requestInput);
        if (!method_exists($controller, $action)) {
            throw new \Exception('${$controller} does not respond to the {$action} action');
        } else
         return $controller->$action();
    }}}
}