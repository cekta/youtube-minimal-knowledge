<?php
declare(strict_types=1);

use Cekta\YoutubeMinimalKnowledge\Server;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

require __DIR__ . '/../vendor/autoload.php';
/** @var ContainerInterface $container */
$container = require __DIR__ . '/../app/di.php';
$server = $container->get(Server::class);
$response = $server->handle(ServerRequestFactory::fromGlobals());
$container->get(SapiEmitter::class)->emit($response);
