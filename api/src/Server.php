<?php
declare(strict_types=1);

namespace Cekta\YoutubeMinimalKnowledge;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class Server
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, FETCH'
        ];
        if ($request->getUri()->getPath() === '/' && $request->getMethod() === 'GET') {
            $response = new JsonResponse(['message' => 'hello world'], 200, $headers);
        } elseif ($request->getUri()->getPath() === '/message' && $request->getMethod()=== 'POST') {
            mail(getenv('MAIL_TO'), 'Сообщение с сайта', "ИМЯ: {$_POST['name']} \n Телефон: {$_POST['phone']}");
            $response = new JsonResponse(['message' => 'message was sent'], 200, $headers);
        } else {
            http_response_code(404);
            $response = new JsonResponse(['message' => 'page not found'], 404, $headers);
        }
        return $response;
    }
}
