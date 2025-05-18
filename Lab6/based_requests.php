<?php
/**
 * $method - это HTTP-метод (GET, POST, PUT или DELETE)
 * $url - URL запроса
 * array или null $data - данные для отправки (для метожов POST/PUT)
 * return array - ассоциативный массив с ответом и информацией о запросе
 */
function makeRequest(string $method, string $url, $data = null) {
    $ch = curl_init();
    
    // Базовые настройки CURL
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=UTF-8'],
        CURLOPT_FAILONERROR => true,
    ];
    
    // Настройки для разных методов
    switch (strtoupper($method)) {
        case 'POST':
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
            break;
            
        case 'PUT':
            $options[CURLOPT_CUSTOMREQUEST] = 'PUT';
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
            break;
            
        case 'DELETE':
            $options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
            break;
            
        case 'GET':
        default:// Для GET запроса не нужно дополнительных настроек
            break;
    }
    
    curl_setopt_array($ch, $options);
    
    $response = curl_exec($ch);
	
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch) . PHP_EOL;
    } else {
        echo "Response:\n" . $response . PHP_EOL;
    }

    curl_close($ch);
}


// Пример URL API
$apiUrl = 'https://jsonplaceholder.typicode.com/posts';

// GET запрос
makeRequest('GET', $apiUrl);

// POST запрос
$newPost = [
    'title'	 => 'Первый пошёл',
    'body'	 => 'А зачем шёл и пришёл - не понятно',
    'userId' => 1
];
makeRequest('POST', $apiUrl, $newPost);

// PUT запрос
$updatedPost = [
    'id'	 => 1,
    'title'	 => 'Второй пошёл',
    'body'	 => 'Пришёл на замену первого. Зачем?',
    'userId' => 1
];
makeRequest('PUT', "$apiUrl/1", $updatedPost);

// DELETE запрос
makeRequest('DELETE', "$apiUrl/1");
?>