<?php
declare(strict_types=1);

use Cekta\YoutubeMinimalKnowledge\Handler\NotFound;
use Cekta\YoutubeMinimalKnowledge\Router;
use Cekta\YoutubeMinimalKnowledge\RouterInterface;
use Psr\Container\ContainerInterface;
use Smpl\Mydi\Container;
use Smpl\Mydi\Loader\Alias;
use Smpl\Mydi\Loader\Service;
use Smpl\Mydi\Provider\Autowire;
use Smpl\Mydi\Provider\KeyValue;
use Symfony\Component\Routing\RouteCollection;

$providers = [];
$providers[] = new KeyValue([
    RouterInterface::class => new Alias(Router::class),
    ContainerInterface::class => new Service(function (ContainerInterface $container) {
        return $container;
    }),
    RouteCollection::class => require __DIR__ . '/routes.php',
    'notFoundHandler' => NotFound::class
]);
$providers[] = Autowire::withoutCache();

return new Container(...$providers);
