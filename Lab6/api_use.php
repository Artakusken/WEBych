<?php

require_once 'ApiClient.php';

$service = new ApiClient('https://jsonplaceholder.typicode.com');

// ��������� ���� ������
$response = $service->apiGet('/posts');
echo "GET /posts:\n";
print_r($response);

// ����� ����
$newPost = [
    'title' => '�������� ���',
    'body' => '������ ���������...',
    'userId' => 99
];

$response = $service->apiPost('/posts', $newPost);
echo "POST /posts:\n";
print_r($response);

// ���������� �����
$updatedPost = [
    'id' => 1,
    'title' => '�������� ������!!!',
    'body' => '���� ������ ���������� �� ������...',
    'userId' => 99
];

$response = $service->apiPut('/posts/1', $updatedPost);
echo "PUT /posts/1:\n";
print_r($response);

// �������� �����
$response = $service->apiDelete('/posts/1');
echo "DELETE /posts/1:\n";
print_r($response);
?>