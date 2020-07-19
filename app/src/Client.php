<?php

declare(strict_types=1);

namespace Solution;

use GuzzleHttp\Client as HttpClient;
use Psr\Http\Client\ClientInterface;
use RuntimeException;

class Client
{
    private ClientInterface $clinet;

    public function __construct(string $serverUrl, string $playerKey)
    {
        $this->client = new HttpClient([
            'base_uri' => $serverUrl,
            'connect_timeout' => 10,
            'allow_redirects' => [
                'max' => 10,
                'referer' => false,
                'strict' => false
            ],
            'headers' => [
                'Content-Type' => 'text/plain'
            ],
            'query' => [
                'apiKey' => $playerKey
            ]
        ]);
    }

    public function send(string $message)
    {
        $res = $this->client->post(
            '/aliens/send',
            [
                'body' => $message
            ]
        );

        if ($res->getStatusCode() !== 200) {
            throw new RuntimeException("Server responded with status {$res->getStatusCode}, body {$res->getBody()}");
        }

        return $res->getBody()->getContents();
    }
}
