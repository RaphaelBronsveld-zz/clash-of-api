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

use Raphaelb\ClashOfApi\Objects\League;

trait ProvideLeagueRequests
{
    /**
     * Get leagues.
     *
     * @return League
     */
    public function getLeagues()
    {
        $response =  $this->sendRequest('GET', 'leagues');
        return new League($response);
    }
}