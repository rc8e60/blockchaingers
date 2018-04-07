<?php

namespace App\Resources\Stellar;

use App\User;
use App\Corporation;
use GuzzleHttp\Exception\ClientException;
use App\Exceptions\ResourceClientException;

class AssetResource extends StellarResource
{
    /**
     * The Stellar API bridge asset endpoint URL.
     *
     * @var string
     */
    private $api;

    /**
     * Create a new Stellar asset resource instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->api = 'asset';
    }

    /**
     * Create a new Stellar asset.
     *
     * @param  \App\Corporation  $corporation
     * @return stdClass
     */
    public function create(Corporation $corporation)
    {
        try {
            $response = $this->client->post($this->api, [
                'json' => [
                    'secret' => $corporation->account_secret,
                    'asset'  => studly_case($corporation->name),
                ],
            ]);
        } catch (ClientException $e) {
            throw new ResourceClientException($this);
        }

        $body = $response->getBody();

        return json_decode($body);
    }

    /**
     * Trust a Stellar asset.
     *
     * @param  \App\Corporation  $corporation
     * @param  \App\User  $user
     * @return stdClass
     */
    public function trust(
        Corporation $corporation,
        User $user
    ) {
        $code = studly_case($corporation->name);
        $issuer = $corporation->account_address;

        try {
            $response = $this->client->post($this->api . '/trust', [
                'json' => [
                    'code'   => $code,
                    'issuer' => $issuer,
                    'secret' => $user->account_secret,
                    'limit'  => (string) 1,
                ],
            ]);
        } catch (ClientException $e) {
            throw new ResourceClientException($this);
        }

        $body = $response->getBody();

        return json_decode($body);
    }
}
