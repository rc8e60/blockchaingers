<?php

namespace App\Exceptions;

use Exception;

class ResourceClientException extends Exception
{
    /**
     * The resource where the exception occured.
     *
     * @var string
     */
    private $resource;

    /**
     * Create a new exception instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = str_before(
            class_basename(
                get_class($resource)
            ),
            'Resource'
        );
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json([
            'form' => 'Something went wrong at our ' . strtolower($this->resource) . ' resource.',
        ], 400);
    }
}
