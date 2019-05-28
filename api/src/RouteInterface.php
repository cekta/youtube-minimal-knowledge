<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

interface RouteInterface
{
    public function getHandler(): string;
}
