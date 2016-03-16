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

class Clash
{
    protected $accesstoken;

    protected $httpClient;

    /**
     * Client constructor.
     */
    public function __construct(){
        $this->setAccessToken();
    }

    /**
     * setAccesstoken method
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
     * @return string
     */
    public function baseUrl(){
        return 'https://api.clashofclans.com/v1/';
    }

    /**
     * @param string $url
     *
     * @return resource
     * @internal param $url
     */
    public function setupUrl($url){
        return $this->getHttpClient()
                    ->request('GET', $url, ['headers' => [
                                        'Accept' => 'application/json',
                                        'authorization' => 'Bearer ' .
               $this->getAccessToken()]]);
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
     * @return mixed
     */
    public function getLeagues(){
        $response =  $this->setupUrl('leagues');
        return $this->properResponse($response);
    }

    /**
     * Get Clans by Search input.
     * @param $input
     * @return mixed
     */
    public function getClans($input){
        $input = is_array($input) ? $input : ['name' => $input];

        $response = $this->setupUrl('clans?' . http_build_query($input));
        return $this->properResponse($response);
    }

    /**
     * Get clan by given id.
     * @param $id
     * @return mixed
     */
    public function getClan($id){
        $response = $this->setupUrl('clans/' . urlencode('#' .$id));
        return $this->properResponse($response);
    }

    /**
     * Get locations.
     * @return mixed
     */
    public function getLocations(){
        $response = $this->setupUrl('locations');
        return $this->properResponse($response);
    }

    /**
     * Get location by given id.
     * @return mixed
     */
    public function getLocation($id){
        $response = $this->setupUrl('locations/'.$id);
        return $this->properResponse($response);
    }

    /**
     * 1 method to get a 'normal' response back.
     * properResponse method
     *
     * @param $response
     *
     * @return mixed
     */
    public function properResponse($response){
        return Response::responseToObject($response);
    }
}