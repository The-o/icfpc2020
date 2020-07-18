<?php

declare(strict_types=1);

namespace Solution;

class Client
{

    private string $serverUrl;

    public function __construct(string $serverUrl)
    {
        $this->serverUrl = $serverUrl;
    }

    public function sendRequest($playerKey)
    {
        $client = new \GuzzleHttp\Client();

        $res = $client->request('POST', $this->serverUrl, [
            'body' => $playerKey
        ]);
        if ($res->getStatusCode() != 200) {
            echo('Unexpected server response:' . "\n");
            echo('HTTP code: ' . $res->getStatusCode() . "\n");
            echo('Response body: ' . $res->getBody());
            exit(2);
        }
        print($res->getBody());
    }


}
