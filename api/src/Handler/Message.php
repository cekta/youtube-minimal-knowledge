<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class Message implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        mail(getenv('MAIL_TO'), 'Сообщение с сайта', "ИМЯ: {$_POST['name']} \n Телефон: {$_POST['phone']}");
        return new JsonResponse(['message' => 'message was sent'], 200, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, FETCH'
        ]);
    }
}
