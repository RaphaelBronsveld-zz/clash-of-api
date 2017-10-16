<?php
/**
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Traits;

use Raphaelb\ClashOfApi\Objects\Location;
use Raphaelb\ClashOfApi\Objects\ClanRankings;
use Raphaelb\ClashOfApi\Objects\PlayerRankings;

trait ProvideLocationRequests
{
    /**
     * Get locations.
     *
     * @return Collection
     */
    public function getLocations()
    {
        $data = $this->sendRequest('GET', 'locations');
        $locations = collect();

        foreach ($data as $location) {
            $locations->push(new Location($location));
        }

        return $locations;
    }

    /**
     * Get location by given id.
     *
     * @param $id
     *
     * @return Location
     */
    public function getLocation($id)
    {
        $data = $this->sendRequest('GET', 'locations/'.$id);
        return new Location($data);
    }

    /**
     * Get rankingdata by given location and type.
     *
     * @param  $location
     * @param  $type
     * @return array
     */
    public function getRankingsByType($location, $type)
    {
        $id = $location instanceof Location ? $location->id : $location;

        return $this->sendRequest('GET', 'locations/'.$id.'/rankings/'.$type);
    }

    /**
     * Get location based rankinglist for players.
     *
     * @param  $location
     * @return PlayerRankings
     */
    public function getPlayerRankings($location)
    {
        $data = $this->getRankingsByType($location, 'players');
        return new PlayerRankings($data);
    }

    /**
     * Get location based rankinglist for clans.
     *
     * @param  $location
     * @return ClanRankings
     */
    public function getClanRankings($location)
    {
        $data = $this->getRankingsByType($location, 'clans');
        return new ClanRankings($data);
    }
}
