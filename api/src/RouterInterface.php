<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

use Psr\Http\Message\ServerRequestInterface;

interface RouterInterface
{
    public function handle(ServerRequestInterface $request): RouteInterface;
}
