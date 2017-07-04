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

use Raphaelb\ClashOfApi\Objects\Player;

trait ProvidePlayerRequests
{
    /**
     * Get player by given tag.
     *
     * @param  $tag
     * @return Player
     */
    public function getPlayer($tag)
    {
        $data = $this->sendRequest('GET', 'players/'.urlencode($tag));
        return new Player($data);
    }
}