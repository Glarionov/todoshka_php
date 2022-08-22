<?php

namespace App\router;

use App\Controllers\AuthController;
use App\Controllers\TaskController;
use App\Controllers\TestController;

class WebRouter extends AbstractRouter
{
    /**
     * @param $verb
     * @param $path
     * @param $controller
     * @param $action
     * @return void
     */
    private function addApiRoute($verb, $path, $controller, $action)
    {
        $this->addRoute($verb, '/api' .$path, $controller, $action);
    }

    /**
     * @return void
     */
    protected function registerRoutes()
    {
        $this->router->set404(function () {
            echo '404, route not found!';
        });

        $this->addRoute('get', '/view', TestController::class, 'view');
        $this->addRoute('get', '', TaskController::class, 'index');
        $this->addRoute('get', '/tasks', TaskController::class, 'index');
        $this->addRoute('get', '/login', AuthController::class, 'showLoginPage');
        $this->addRoute('post', '/login', AuthController::class, 'showLoginPage');
        $this->addRoute('get', '/logout', AuthController::class, 'logout');

        $this->addApiRoute('get', '/tasks', TaskController::class, 'list');
        $this->addApiRoute('post', '/tasks', TaskController::class, 'store');

        $this->addApiRoute('patch', '/tasks/(\d+)', TaskController::class, 'update');
    }
}