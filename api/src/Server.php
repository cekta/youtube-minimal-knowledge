<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Server implements RequestHandlerInterface
{
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var HandlerProvider
     */
    private $handlerProvider;

    public function __construct(RouterInterface $router, HandlerProvider $handlerProvider)
    {
        $this->router = $router;
        $this->handlerProvider = $handlerProvider;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $route = $this->router->handle($request);
        $handler = $this->handlerProvider->provide($route->getHandler());
        return $handler->handle($request);
    }
}
