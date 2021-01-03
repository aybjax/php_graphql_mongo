<?php
use Project\Data\User;
require_once '../project/init.php';

// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Slim\Factory\AppFactory;

// $app = AppFactory::create();

// $url = sprintf("mongodb://%s:%s@%s:27017",
//                 getenv('MONGO_INITDB_ROOT_USERNAME'),
//                 getenv('MONGO_INITDB_ROOT_PASSWORD'),
//                 'mongo');

// // $client = new MongoDB\Client($url);
// // $db = $client->db;
// // $testCollection = $db->test;

// $collection = (new MongoDB\Client)->db->users;

// $app->get('/status', function (Request $request, Response $response, array $args) {
//     $payload = json_encode(['hello' => 'world'], JSON_PRETTY_PRINT);
//     $response->getBody()->write($payload);
//     return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
// });

// $app->get('/', function (Request $request, Response $response, array $args) use($collection) {
//     $insertOneResult = $collection->insertOne([
//         'username' => 'admin',
//         'email' => 'admin@example.com',
//         'name' => 'Admin User',
//     ]);

//     printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

//     var_dump($insertOneResult->getInsertedId());

//     $payload = json_encode(['status' => 'ok'], JSON_PRETTY_PRINT);
//     $response->getBody()->write($payload);
//     return $response;
//                     // ->withHeader('Content-Type', 'application/json')
//                     // ->withStatus(200);

// });

// $app->run();
