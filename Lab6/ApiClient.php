<?php

class ApiClient
{
    private string $url;
    private array $defaultHeaders;

    public function __construct(string $baseUrl, string $username, string $password)
    {
        $this->url = rtrim($baseUrl, '/');
		if (!empty($username) && !empty($password)) {
			$secrets = base64_encode("$username:$password");
			$this->defaultHeaders[] = "Authorization: $secrets";
		}
    }

    private function request(string $endPoint, string $httpMethod, array $data = null): array
    {
        $ch = curl_init();

        $url = $this->url . $endPoint;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($httpMethod));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = $this->defaultHeaders;

        if ($data !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $headers[] = 'Content-Type: application/json';
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
		$error = curl_error($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
        if (curl_errno($ch)) {
            $errorMsg = "Request error: " . $error;
			curl_close($ch);
			throw new Exception($errorMsg);
        }
		
        curl_close($ch);
		
		if ($statusCode >= 400) {
			$errorMessage = "HTTP Error $statusCode";
			$decodedError = json_decode($response, true);
			
			if (json_last_error() === JSON_ERROR_NONE && isset($decodedError['message'])) {
				$errorMessage .= ": " . $decodedError['message'];
			} else {
				$errorMessage .= ". Response: " . substr($response, 0, 200);
			}
			throw new Exception($errorMessage);
		}
		
		$decodedBody = json_decode($response, true);
		if ($response !== '' && json_last_error() !== JSON_ERROR_NONE) {
			throw new Exception("JSON Parse Error: " . json_last_error_msg());
		}
	
        return [
            'status' => $statusCode,
            'body' => $decodedBody
        ];
    }

    public function apiGet(string $endpoint): array
    {
        return $this->request($endpoint, 'GET');
    }

    public function apiPost(string $endpoint, array $payload): array
    {
        return $this->request($endpoint, 'POST', $payload);
    }

    public function apiPut(string $endpoint, array $payload): array
    {
        return $this->request($endpoint, 'PUT', $payload);
    }

    public function apiDelete(string $endpoint): array
    {
        return $this->request($endpoint, 'DELETE');
    }
}
?>