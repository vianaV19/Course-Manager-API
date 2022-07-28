<?php header('Access-Control-Allow-Origin: *'); ?>

<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use \App\Controllers\AppController;

require __DIR__ . '../../vendor/autoload.php';

require __DIR__ . '../../App/Container.php';

AppController::setContainer($container);

$app = AppFactory::create();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/api/courses', function (Request $request, Response $response) {
    return AppController::get($request, $response);
});


$app->get('/api/courses/{id}', function (Request $request, Response $response, $args) {
    return AppController::get($request, $response, $args);
});

$app->delete('/api/courses/{id}', function (Request $request, Response $response, $args) {
    return AppController::delete($request, $response, $args);
});

$app->put('/api/courses', function (Request $request, Response $response) {
    return AppController::put($request, $response);
});

$app->run();
