<?php
declare(strict_types=1);

// CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, FETCH');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_URI'] === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['message' => 'hello world']);
} elseif ($_SERVER['REQUEST_URI'] === '/message' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Здесь отправку на почту
    mail(getenv('MAIL_TO'), 'Сообщение с сайта', "ИМЯ: {$_POST['name']} \n Телефон: {$_POST['phone']}");
    echo json_encode(['message' => 'message was sent']);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'page not found']);
}


