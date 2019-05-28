<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router implements RouterInterface
{
    /**
     * @var RouteCollection
     */
    private $routeCollection;
    /**
     * @var string
     */
    private $notFoundHandler;

    public function __construct(RouteCollection $routeCollection, string $notFoundHandler)
    {
        $this->routeCollection = $routeCollection;
        $this->notFoundHandler = $notFoundHandler;
    }

    public function handle(ServerRequestInterface $request): RouteInterface
    {
        $matcher = new UrlMatcher($this->routeCollection, new RequestContext());
        try {
            $symfonyRoute = $matcher->match($request->getUri()->getPath());
            $handler = $symfonyRoute['_route'];
        } catch (ResourceNotFoundException $exception) {
            $handler = $this->notFoundHandler;
        }
        return new Route($handler);
    }
}
