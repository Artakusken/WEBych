<?php

require_once 'ApiClient.php';

$service = new ApiClient('https://jsonplaceholder.typicode.com');

// Получение всех постов
$response = $service->apiGet('/posts');
echo "GET /posts:\n";
print_r($response);

// Новый пост
$newPost = [
    'title' => 'ИСЦЕЛЯЕТ РАК',
    'body' => 'Старый советский...',
    'userId' => 99
];

$response = $service->apiPost('/posts', $newPost);
echo "POST /posts:\n";
print_r($response);

// Обновление поста
$updatedPost = [
    'id' => 1,
    'title' => 'ИСЦЕЛЯЕТ АУТИЗМ!!!',
    'body' => 'Надо просто отказаться от привив...',
    'userId' => 99
];

$response = $service->apiPut('/posts/1', $updatedPost);
echo "PUT /posts/1:\n";
print_r($response);

// Удаление поста
$response = $service->apiDelete('/posts/1');
echo "DELETE /posts/1:\n";
print_r($response);
?>