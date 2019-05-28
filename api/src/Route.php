<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

class Route implements RouteInterface
{
    /**
     * @var string
     */
    private $handler;

    public function __construct(string $handler)
    {
        $this->handler = $handler;
    }

    public function getHandler(): string
    {
        return $this->handler;
    }
}
