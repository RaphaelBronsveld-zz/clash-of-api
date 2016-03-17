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
use Raphaelb\ClashOfApi\Clan\Clan;
use Raphaelb\ClashOfApi\League\League;
use Raphaelb\ClashOfApi\Location\Location;

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
     * @param string $url
     *
     * @return array
     * @internal param $url
     */
    public function setupUrl($url){
        $response = $this->getHttpClient()
                    ->request('GET', $url, ['headers' => [
                                        'Accept' => 'application/json',
                                        'authorization' => 'Bearer ' .
               $this->getAccessToken()]]);

        return json_decode($response->getBody()->getContents(), true);
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
     * @return \Raphaelb\ClashOfApi\League\League
     */
    public function getLeagues(){
        $response =  $this->setupUrl('leagues');
        return new League($response);
    }

    /**
     * Get Clans by Search input.
     *
     * @param $input
     * @return \Raphaelb\ClashOfApi\Clan\Clan
     */
    public function getClans($input){

        /*
		* $input array can have these indexes:
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
		For more information, take a look at the official documentation: https://developer.clashofclans.com/#/documentation
		*/

        $input = is_array($input) ? $input : ['name' => $input];

        $response = $this->setupUrl('clans?' . http_build_query($input));
        return new Clan($response);
    }

    /**
     * Get clan by given id.
     *
     * @param $id
     * @return \Raphaelb\ClashOfApi\Clan\Clan
     */
    public function getClan($id){
        $response = $this->setupUrl('clans/' . urlencode('#' .$id));
        return new Clan($response);
    }

    /**
     * Get locations.
     *
     * @return \Raphaelb\ClashOfApi\Location\Location
     */
    public function getLocations(){
        $response = $this->setupUrl('locations');
        return new Location($response);
    }

    /**
     * Get location by given id.
     *
     * @param $id
     *
     * @return \Raphaelb\ClashOfApi\Location\Location
     */
    public function getLocation($id){
        $response = $this->setupUrl('locations/'.$id);
        return new Location($response);
    }
}