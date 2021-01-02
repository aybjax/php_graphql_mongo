<?php
// require_once '../project/init.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use MongoDB\MongoClient;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/status', function (Request $request, Response $response, array $args) {
    $m = new MongoClient('mongodb://mongo:27017');

    echo "after <br/>";

    $payload = json_encode(['hello' => 'world'], JSON_PRETTY_PRINT);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);

});

$app->post('/', function (Request $request, Response $response, array $args) {
    $payload = json_encode(['hello' => 'world'], JSON_PRETTY_PRINT);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);

});

$app->run();
