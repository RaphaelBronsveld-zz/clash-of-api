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

class Match extends BaseObject
{
    /**
     * Class relations.
     *
     * @return array
     */
    public function relations()
    {
        return [
            'clan'          => Clan::class,
            'opponent'      => Clan::class
        ];
    }

    /**
     * Return the given clan.
     *
     * @return Clan
     */
    public function getClan()
    {
        return $this->get('clan');
    }

    /**
     * Return the opponent of the match instance.
     *
     * @return mixed
     */
    public function getOpponent()
    {
        return $this->get('opponent');
    }
}
