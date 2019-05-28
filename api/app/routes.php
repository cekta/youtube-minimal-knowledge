<?php
declare(strict_types=1);

use Cekta\YoutubeMinimalKnowledge\Handler\Hello;
use Cekta\YoutubeMinimalKnowledge\Handler\Message;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add(Hello::class, new Route('/'));
$routes->add(Message::class, new Route('/message'));
return $routes;
