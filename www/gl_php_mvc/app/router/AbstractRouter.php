<?php

namespace App\router;

use App\Controllers\AbstractController;
use App\Controllers\TestController;
use Bramus\Router\Router;

class AbstractRouter
{

    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * @param $verb
     * @param $path
     * @param $controller
     * @param $action
     * @return void
     */
    protected function addRoute($verb, $path, $controller, $action)
    {
        $this->router->{$verb}($path, function (...$params) use ($controller, $action) {
            $controllerObject = new $controller();
            $actionResult = $controllerObject->{$action}(...$params);
            if (is_array($actionResult)) {
                echo json_encode($actionResult);
            }
        });
    }

    /**
     * @return void
     */
    protected function registerRoutes()
    {
        // Here descendants can define routes
    }

    /**
     * @return void
     */
    public function doActionByRoute()
    {
        $this->registerRoutes();
        $this->router->run();
    }
}