<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HandlerProvider
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function provide(string $name): RequestHandlerInterface
    {
        return $this->container->get($name);
    }

}
