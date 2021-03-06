<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 01-07-2018
 * Time: 01:01
 */
declare(strict_types=1);

namespace Example;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';
//$environment = 'production';

$whoops = new \Whoops\Run;
if($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function ($e){
        // TODO: Friendly error page and send email to developer
        echo 'TODO: Friendly error page and send email to developer';
    });
}

$whoops->register();

$injector = include ('Dependencies.php');

$request = $injector->make('Http\HttpRequest');
$response = $injector->make('Http\HttpResponse');

$routeDefinitionCallback = function (\FastRoute\RouteCollector $r) {
    $routes = include ('Routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());

switch ($routeInfo[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        $response->setContent('404 Page not found');
        $response->setStatusCode(404);
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 Method not allowed');
        $response->setStatusCode(405);
        break;
    case \FastRoute\Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        $class = $injector->make($className);
        $class->$method($vars);
        break;
}

foreach ($response->getHeaders() as $header) {
    header($header, false);
}

echo $response->getContent();
