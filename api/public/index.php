<?php
declare(strict_types=1);

// CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, FETCH');

header('Content-Type: application/json');
echo json_encode(['message' => 'hello world']);

