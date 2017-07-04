<?php
/**
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Objects;

class WarLog extends BaseObject
{
    /**
     * Class relations.
     *
     * @return array
     */
    public function relations()
    {
        return [
            'indexed'           => Match::class
        ];
    }

    /**
     * Return the total wins.
     *
     * @param  null $teamSize
     * @return int
     */
    public function getWinsCount($teamSize = null)
    {
        return $this->filterByMatchAttributes('win', $teamSize);
    }

    /**
     * Return the total losses.
     *
     * @param  null $teamSize
     * @return int
     */
    public function getLossesCount($teamSize = null)
    {
        return $this->filterByMatchAttributes('lose', $teamSize);
    }

    /**
     * @param $type
     * @param null $teamSize
     * @return mixed
     */
    protected function filterByMatchAttributes($type, $teamSize = null)
    {
        $matches = $this->filter(
            function ($match) use ($type) {
                return $match->result == $type;
            }
        );

        return isset($teamSize) ? $matches->filter(
            function ($match) use ($teamSize) {
                return $match->teamSize == $teamSize;
            }
        )->count() : $matches->count();
    }

    /**
     * Return the match dates.
     * Quite a lot of logic is required to return human readable timestamps so I'll leave that up to you.
     *
     * @return array
     */
    public function getMatchDates()
    {
        return $this->pluck('endTime')->all();
    }
}
