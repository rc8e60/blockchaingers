<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Resources\Kvk\CompanyResource;

class CompanyController extends Controller
{
    /**
     * KvK company resource instance.
     *
     * @var \App\Resources\Kvk\CompanyResource
     */
    private $resource;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Resources\Kvk\CompanyResource  $resource
     * @return void
     */
    public function __construct(CompanyResource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $query
     * @return \Illuminate\Http\Response
     */
    public function show($query)
    {
        if (is_numeric($query)) {
            return response()->json(
                $this->resource->findById($query)->companies
            );
        }

        return response()->json(
            $this->resource->findByTradeName($query)->companies
        );
    }
}
