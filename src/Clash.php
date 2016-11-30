<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Raphaelb\ClashOfApi\Objects\Clan;
use Raphaelb\ClashOfApi\Objects\Player;
use Raphaelb\ClashOfApi\Objects\WarLog;
use Raphaelb\ClashOfApi\Objects\League;
use Raphaelb\ClashOfApi\Objects\Location;

class Clash
{
    protected $accesstoken;

    protected $httpClient;

    /**
     * Clash class constructor.
     */
    public function __construct(){
        $this->setAccessToken();
    }

    /**
     * Setting Accesstoken
     */
    public function setAccessToken(){
        $this->accesstoken = config('clash.key');
    }

    /**
     * getAccessToken method
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accesstoken;
    }

    /**
     * Base url for API v1.
     *
     * @return string
     */
    public function baseUrl(){
        return 'https://api.clashofclans.com/v1/';
    }

    /**
     * Sends a request to the Clash Api and returns the response.
     *
     * @param $method
     * @param $endpoint
     * @return array
     * @throws \Exception
     */
    public function sendRequest($method, $endpoint){
        try {
            $request = $this->getHttpClient()
                ->request($method, $endpoint, ['headers' => [
                    'Accept' => 'application/json',
                    'authorization' => 'Bearer ' .
                        $this->getAccessToken()
                    ]
                ]);
            $data = json_decode($request->getBody()->getContents(), true);

            return $this->respondToArray($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Make sure we respond properly to the given param.
     * Just return an array with results you can loop.
     *
     * @param $array
     * @return mixed
     */
    public function respondToArray(array $array)
    {
        return array_key_exists('items', $array) ? $array['items'] : $array;
    }

    /**
     * getHttpClient method
     *
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        if($this->httpClient === null)
        {
            $this->httpClient = new Client(['base_uri' => $this->baseUrl()]);
        }

        return $this->httpClient;
    }

    /**
     * Get leagues.
     *
     * @return \Raphaelb\ClashOfApi\Objects\League
     */
    public function getLeagues(){
        $response =  $this->sendRequest('GET', 'leagues');
        return new League($response);
    }

    /**
     * Get Clans by Search input.
     *
     * name (string)
     * warFrequency (string, {"always", "moreThanOncePerWeek", "oncePerWeek", "lessThanOncePerWeek", "never", "unknown"})
     * locationId (integer)
     * minMembers (integer)
     * maxMembers (integer)
     * minClanPoints (integer)
     * minClanLevel (integer)
     * limit (integer)
     * after (integer)
     * before (integer)
     *
     * @param $input array string
     * @return Collection
     */
    public function getClans($input){
        $input = is_array($input) ? $input : ['name' => $input];

        $data = $this->sendRequest('GET', 'clans?' . http_build_query($input));
        $clans = [];

        foreach($data as $clan){
            $clans[] = new Clan($clan);
        };

        return collect($clans);
    }

    /**
     * Get clan by given Clan Tag.
     *
     * @param $tag
     * @return \Raphaelb\ClashOfApi\Objects\Clan
     */
    public function getClan($tag){
        $data = $this->sendRequest('GET', 'clans/' . urlencode($tag));
        return new Clan($data);
    }

    /**
     * Get Warlog by given clan object or tag.
     *
     * @param $tag
     * @return WarLog
     */
    public function getWarLog($tag)
    {
        $tag = $tag instanceof Clan ? $tag->getTag() : $tag;

        $data = $this->sendRequest('GET', 'clans/'.urlencode($tag).'/warlog');

        return new WarLog($data);
    }

    /**
     * Get locations.
     *
     * @return Collection
     */
    public function getLocations(){
        $data = $this->sendRequest('GET', 'locations');
        $locations = [];

        foreach($data as $location) {
            $locations[] = new Location($location);
        }

        return collect($locations);
    }

    /**
     * Get location by given id.
     *
     * @param $id
     *
     * @return \Raphaelb\ClashOfApi\Objects\Location
     */
    public function getLocation($id){
        $data = $this->sendRequest('GET', 'locations/'.$id);
        return new Location($data);
    }

    /**
     * Get player by given tag.
     *
     * @param $tag
     * @return Player
     */
    public function getPlayer($tag)
    {
        $data = $this->sendRequest('GET', 'players/'.urlencode($tag));
        return new Player($data);
    }
}