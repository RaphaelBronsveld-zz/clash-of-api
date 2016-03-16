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

class Response {
    /**
     * Make sure we respond properly to the given param.
     * Just return an array with results you can loop.
     *
     * @param  $response
     *
     * @return array
     */
    public static function responseToObject($response)
    {
        /**
         * @var \GuzzleHttp\Psr7\Response $response
         */
        $response =  json_decode($response->getBody()->getContents(), true);
        if(array_key_exists('items', $response)){
            return json_decode(json_encode($response))->items;
        }
        return json_decode(json_encode($response));
    }
}