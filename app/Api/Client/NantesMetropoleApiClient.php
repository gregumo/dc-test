<?php

namespace App\Api\Client;

use App\Api\Transformers\ComposterTransformer;
use App\Models\Composter;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
class NantesMetropoleApiClient implements ClientInterface
{

    /**
     * @var Client $client
     */
    private $client;

    /**
     * @var string $apiBaseUrl
     */
    private $apiBaseUrl;

    /**
     * @param Client $client
     * @param string $apiBaseUrl
     */
    public function __construct(Client $client, $apiBaseUrl)
    {
        $this->client = $client;
        $this->apiBaseUrl = $apiBaseUrl;
    }

    /**
     * @param string $method
     * @param string $path
     *
     * @return ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $path)
    {
        return $this->client->request($method, sprintf(
            '%s/%s',
            $this->apiBaseUrl,
            $path
        ));
    }

    /**
     * @param int $limit
     *
     * @return Composter[]
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function importComposters($limit = 20): array
    {
        $response = $this->request(Request::METHOD_GET, sprintf(
            'search/?dataset=512042839_composteurs-quartier-nantes-metropole&rows=%s',
            $limit
        ));

        $contents = json_decode($response->getBody()->getContents());

        Composter::truncate();

        $composters = array_map(function ($data) {
            $composter = (new ComposterTransformer())->transformDataToModel($data->fields);
            $composter->save();
            return $composter;
        }, $contents->records);

        return $composters;
    }
}