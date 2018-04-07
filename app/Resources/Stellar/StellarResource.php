<?php

namespace App\Resources\Stellar;

use GuzzleHttp\Client;

class StellarResource
{
    /**
     * The GuzzleHttp client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new Stellar resource instance.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.stellar.apiUri'),
            'headers'  => [
                'X-API-KEY' => config('services.stellar.apiKey'),
            ],
        ]);
    }
}
