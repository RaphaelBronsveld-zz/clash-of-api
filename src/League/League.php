<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\League;

use Raphaelb\ClashOfApi\AbstractResponse;

class League extends AbstractResponse
{
    /**
     * League constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $this->respondToArray($data);
    }
}