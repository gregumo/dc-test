<?php

namespace App\Api\Client;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
interface ClientInterface
{
    /**
     * @param Client $client
     * @param string $apiBaseUrl
     */
    public function __construct(Client $client, $apiBaseUrl);

    /**
     * @param string $method
     * @param string $path
     *
     * @return ResponseInterface
     */
    public function request($method, $path);
}