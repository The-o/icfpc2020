<?php

$server_url = $argv[1];
$player_key = $argv[2];
echo('ServerUrl: ' . $server_url . '; PlayerKey: ' . $player_key . "\n");

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $server_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $player_key);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$body = curl_exec($curl);
$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

if ($status_code != 200) {
    echo('Unexpected server response:' . "\n");
    echo('HTTP code: ' . $status_code . "\n");
    echo('Response body: ' . $body);
    exit(2);
}

print('Server response: ' . $body);

?>