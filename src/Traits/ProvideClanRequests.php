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

use Raphaelb\ClashOfApi\Objects\Clan;
use Raphaelb\ClashOfApi\Objects\WarLog;

trait ProvideClanRequests
{
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
     * @param  $input array|string
     * @return Collection
     */
    public function getClans($input)
    {
        $input = is_array($input) ? $input : ['name' => $input];

        $data = $this->sendRequest('GET', 'clans?' . http_build_query($input));
        $clans = collect();

        foreach ($data as $clan) {
            $clans->push(new Clan($clan));
        };

        return $clans;
    }

    /**
     * Get clan by given Clan Tag.
     *
     * @param  string $tag
     * @return Clan
     */
    public function getClan($tag)
    {
        $data = $this->sendRequest('GET', 'clans/' . urlencode($tag));
        return new Clan($data);
    }

    /**
     * Get Warlog by given clan object or clan tag.
     *
     * @param  $tag
     * @return WarLog
     */
    public function getWarLog($tag)
    {
        $tag = $tag instanceof Clan ? $tag->getTag() : $tag;

        $data = $this->sendRequest('GET', 'clans/'.urlencode($tag).'/warlog');

        return new WarLog($data);
    }
}
