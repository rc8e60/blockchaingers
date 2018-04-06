<?php

namespace App\Resources\Kvk;

use GuzzleHttp\Client;

class KvkResource
{
    /**
     * The GuzzleHttp client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new resource instance.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.kvk.apiUri'),
            'query'    => [
                'api_key' => config('services.kvk.apiKey'),
            ],
        ]);
    }
}
