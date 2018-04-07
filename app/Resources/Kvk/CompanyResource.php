<?php

namespace App\Resources\Kvk;

use App\Exceptions\ResourceClientException;

class CompanyResource extends KvkResource
{
    /**
     * The Kvk API company endpoint URL.
     *
     * @var string
     */
    private $api;

    /**
     * Create a new KvK company resource instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->api = 'companies';
    }

    /**
     * Find a company by its trade name.
     *
     * @param  string  $name
     * @return stdClass
     */
    public function findByTradeName(string $name)
    {
        try {
            $response = $this->client->get(
                $this->api . '/by-trade-name/' . $name
            );
        } catch (ClientException $e) {
            throw new ResourceClientException($this);
        }

        $body = $response->getBody();

        return json_decode($body);
    }

    /**
     * Find a company by its ID.
     *
     * @param  int  $id
     * @return stdClass
     */
    public function findById(int $id)
    {
        try {
            $response = $this->client->get(
                $this->api . '/by-kvknumber/' . $id
            );
        } catch (ClientException $e) {
            throw new ResourceClientException($this);
        }

        $body = $response->getBody();

        return json_decode($body);
    }
}
