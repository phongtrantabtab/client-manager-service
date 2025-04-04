<?php

namespace App\External\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

/**
 * App\External\Traits
 *
 * @package App\External\Traits\ExternalAPITrait
 * @copyright Copyright (c) 2025, jarvis.phongtran
 * @author Phong <jarvis.phongtran@gmail.com>
 */
trait ExternalAPITrait
{
    public function call(string $method, string $url, array $data = [], array $headers = [])
    {
        Log::channel('info')->info('External API: (' . $method . ') ' . $url . ' with data: ' . json_encode($data));
        try {
            $client = new Client();
            $response = $client->request($method, $url, [
                'headers' => $headers,
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            Log::channel('fatal')->error($e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
