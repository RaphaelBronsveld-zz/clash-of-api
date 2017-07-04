<?php
/**
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi;

use GuzzleHttp\Client;
use Raphaelb\ClashOfApi\Traits\ProvideClanRequests;
use Raphaelb\ClashOfApi\Traits\ProvideLeagueRequests;
use Raphaelb\ClashOfApi\Traits\ProvideLocationRequests;
use Raphaelb\ClashOfApi\Traits\ProvidePlayerRequests;

class Clash
{
    use ProvideClanRequests;
    use ProvideLeagueRequests;
    use ProvidePlayerRequests;
    use ProvideLocationRequests;

    protected $accessToken;
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * Clash class constructor.
     */
    public function __construct()
    {
        $this->setAccessToken();
    }

    /**
     * Base url for API v1.
     *
     * @return string
     */
    public function baseUrl()
    {
        return 'https://api.clashofclans.com/v1/';
    }

    /**
     * Sends a request to the Clash Api and returns the response.
     *
     * @param  $method
     * @param  $endpoint
     * @return array
     * @throws \Exception
     */
    public function sendRequest($method, $endpoint)
    {
        $request = $this->getHttpClient()
            ->request(
                $method, $endpoint, ['headers' => [
                'Accept' => 'application/json',
                'authorization' => 'Bearer ' .
                    $this->getAccessToken()
                ]
            ]);
        $data = json_decode($request->getBody()->getContents(), true);

        return $this->respondToArray($data);
    }

    /**
     * Make sure we respond properly to the given param.
     * Just return an array with results you can loop.
     *
     * @param  $array
     * @return mixed
     */
    public function respondToArray(array $array)
    {
        return array_key_exists('items', $array) ? $array['items'] : $array;
    }

    /**
     * Get the http client instance.
     *
     * @return Client
     */
    public function getHttpClient()
    {
        if ($this->httpClient === null) {
            $this->httpClient = new Client(['base_uri' => $this->baseUrl()]);
        }

        return $this->httpClient;
    }

    /**
     * Setting Accesstoken
     */
    public function setAccessToken()
    {
        $this->accessToken = config('clash.key');
    }

    /**
     * getAccessToken method
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
