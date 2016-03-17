<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Clan;

use Raphaelb\ClashOfApi\AbstractResponse;

class Clan extends AbstractResponse
{
    /**
     * Clan constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $this->respondToArray($data);
    }

    /**
     * Get member list by given clan object.
     *
     * @return array
     */
    public function getMemberList()
    {
        return $this->data->memberList;
    }

    /**
     * Returns the location of the given clan object.
     *
     * @return array
     */
    public function getLocation(){
        return $this->data->location;
    }

    /**
     * Get member count by given clan object.
     *
     * @return string
     */
    public function getMemberCount(){
        return $this->data->members;
    }

    /**
     * Get all the leaders by given clan object.
     *
     * @return array
     */
    public function getLeaders(){
        $leaders = [];

        foreach ($this->getMemberList() as $member){
            if($member->role === 'leader' || $member->role === 'coLeader'){
                $leaders[] = $member;
            }
        }

        return $leaders;
    }
}