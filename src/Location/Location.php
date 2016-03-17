<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Location;

use Raphaelb\ClashOfApi\AbstractResponse;

class Location extends AbstractResponse
{
    /**
     * Location constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $this->respondToArray($data);
    }

    /**
     * Get all the countries.
     *
     * @return array
     */
    public function getCountries()
    {
        $countries = [];

        foreach($this->data as $location){
            if($location->isCountry){
                $countries[$location->name] = $location;
            }
        }

        return $countries;
    }
}