<?php
function getWithHeaders($url, $headers) 
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => $headers,
    ]);
    echo "GET with headers:\n" . curl_exec($ch) . "\n\n";
    curl_close($ch);
}

function postJsonData($url, $data) 
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS     => json_encode($data),
    ]);
    echo "POST with JSON:\n" . curl_exec($ch) . "\n\n";
    curl_close($ch);
}

function getWithParams($url, $params) 
{
    $query = http_build_query($params);
    $ch = curl_init("$url?$query");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    echo "GET with URL params:\n" . curl_exec($ch) . "\n\n";
    curl_close($ch);
}


getWithHeaders(
    "https://jsonplaceholder.typicode.com/posts/1", 
    ["Accept: application/json", "X-Custom-Header: BigHead"]
);

postJsonData(
    "https://jsonplaceholder.typicode.com/posts",
    ['title' => 'GTA 6 Data', 'body' => 'many data pieces', 'userId' => 31]
);

getWithParams(
    "https://jsonplaceholder.typicode.com/comments",
    ['DataLeakDate' => '24.05.2025']
);
?>