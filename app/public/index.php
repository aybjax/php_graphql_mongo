<?php

use Project\Util\DBFacade;
use Project\Data\User;

require_once '../project/init.php';

$user = User::fromArray([
  "fname" => "ayb",
  "lname" => "jax",
  "email" => "ayb@jax",
  "rating" => 1,
]);

echo "unsaved data: <br/>";
var_dump($user);

$id = $user->id;
echo "<br/>unsaved id: <br/>";
var_dump($id);

$user->save();

echo "<br/><br/><br/>";

echo "saved data: <br/>";
var_dump($user);

$id = $user->id;
echo "<br/>saved id: <br/>";
var_dump($id);

echo "<br/><br/><br/>";

echo "new data1: <br/>";
$user = new User();
var_dump($user);

$user->getQuery("fname = 'ayb'");
echo "<br/>filled data1: <br/>";
var_dump($user);

// echo "<br/><br/><br/>";

// echo "new data2: <br/>";
// $user = new User();
// var_dump($user);

// $user->getQuery("fname = ?", ["ayb"]);
// echo "<br/>filled data2: <br/>";
// var_dump($user);

// echo "<br/><br/><br/>";

// echo "new data3: <br/>";
// $user = new User();
// $user->id = $id;
// var_dump($user);

// $user->getQuery("fname = :ayb", [":ayb" => "ayb"]);
// echo "<br/>filled data3: <br/>";
// var_dump($user);

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
