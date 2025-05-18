<?php
function sendCurlRequest($url, $method = 'GET', $payload = null, $headers = []) {
    $ch = curl_init();
    
    try {
        // ������� ���������
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => strtoupper($method),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_FAILONERROR => false
        ]);

        // ��������� ���� �������
        if ($payload !== null) {
            $jsonData = json_encode($payload);
            if ($jsonData === false) {
                throw new Exception('JSON encoding error: ' . json_last_error_msg());
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($headers, ['Content-Type: application/json']));
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        $errno = curl_errno($ch);

        if ($errno) {
            throw new Exception("cURL error ($errno): $error");
        }

        // ������� JSON ������
        $data = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('JSON parsing error: ' . json_last_error_msg());
        }

        // ��������� HTTP ��������
        if ($httpCode >= 400) {
            $statusType = ($httpCode >= 500) ? 'Server Error' : 'Client Error';
            throw new Exception("HTTP $statusType ($httpCode)");
        }

        // ����� ��������� ����������
        echo "Success! HTTP $httpCode\n";
        print_r($data);

    } catch (Exception $e) {
        // ��������� ������
        echo "Error: " . $e->getMessage() . "\n";
        if (isset($response)) {
            echo "Raw response: $response\n";
        }
    } finally {
        curl_close($ch);
    }
}

// ������� ������ (�������� ��� ���������)
$apiUrl = 'https://jsonplaceholder.typicode.com/posts';
sendCurlRequest($apiUrl);
sendCurlRequest($apiUrl, 'POST', ['title' => 'foo', 'body' => 'bar', 'userId' => 1]);
sendCurlRequest($apiUrl . '/1', 'PUT', ['id' => 1, 'title' => 'updated', 'body' => 'updated', 'userId' => 1]);
sendCurlRequest($apiUrl . '/1', 'DELETE');
?>