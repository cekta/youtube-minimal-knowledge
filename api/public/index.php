<?php
declare(strict_types=1);

use Cekta\YoutubeMinimalKnowledge\Server;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

require __DIR__ . '/../vendor/autoload.php';

$server = new Server();
$request = ServerRequestFactory::fromGlobals();
$response = $server->handle($request);
$emitter = new SapiEmitter();
$emitter->emit($response);
