<?php

namespace App\Http\Requests;

use GuzzleHttp\Client;

class CouponRequest
{
    private $client;
    private $url;

    public function __construct(Client $client, string $url)
    {
        $this->client = $client;
        $this->url = $url;
    }

    public function requestCoupon()
    {
        $response = $this->client->request('GET', $this->url, $this->makeHeaders());

        if (!(200 === $response->getStatusCode())) {
            return null;
        }

        $jsonResponse = json_decode($response->getBody()->getContents());

        if (!$jsonResponse->data) {
            return null;
        }

        return $jsonResponse->data ?: null;
    }

    private function makeHeaders(): array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];
    }
}