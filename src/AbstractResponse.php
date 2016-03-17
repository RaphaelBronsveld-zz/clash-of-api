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

abstract class AbstractResponse {

    public $data;

    /**
     * Make sure we respond properly to the given param.
     * Just return an array with results you can loop.
     *
     * @param  $response
     *
     * @return object
     */
    public function respondToArray($response)
    {
        if(array_key_exists('items', $response)){

             return $this->parseResponse($response['items']);
        }
       return $this->parseResponse($response);
    }

    /**
     * Parse response into data property.
     *
     * @param $items
     *
     * @return object $this
     */
    protected function parseResponse($items){
        foreach($items as $key => $item){
            $this->data[$key] = $item;
        }
        return json_decode(json_encode($this->data));
    }
}