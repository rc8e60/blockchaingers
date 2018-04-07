<?php

namespace App\Resources\Stellar;

use GuzzleHttp\Exception\ClientException;
use App\Exceptions\ResourceClientException;

class AccountResource extends StellarResource
{
    /**
     * The Stellar API bridge account endpoint URL.
     *
     * @var string
     */
    private $api;

    /**
     * Create a new Stellar account resource instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->api = 'account';
    }

    /**
     * Create a new Stellar account.
     *
     * @return stdClass
     */
    public function create()
    {
        try {
            $response = $this->client->post($this->api);
        } catch (ClientException $e) {
            throw new ResourceClientException($this);
        }

        $body = $response->getBody();

        return json_decode($body);
    }
}
