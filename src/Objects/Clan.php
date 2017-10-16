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

use Illuminate\Support\Collection;
use Raphaelb\ClashOfApi\Exceptions\NoMemberListException;

class Clan extends BaseObject
{
    /**
     * Class relations.
     *
     * @return array
     */
    public function relations()
    {
        return [
            'location'          => Location::class,
            'badgeUrls'         => Badge::class,
            'memberList'        => MemberList::class
        ];
    }

    /**
     * Returns the clan tag.
     *
     * @return string
     */
    public function getTag()
    {
        return $this->get('tag');
    }

    /**
     * Returns the member list by given clan object.
     * Cannot be called on clans retrieved
     * from the getClans() method.
     *
     * @return Collection
     * @throws NoMemberListException
     */
    public function getMembers()
    {
        if (!$this->has('memberList')) {
            throw new NoMemberListException('Clan instance has no memberlist property.');
        } else {
            return $this->get('memberList');
        }
    }

    /**
     * Returns the location of the given clan object.
     *
     * @return array
     */
    public function getLocation()
    {
        return $this->get('location');
    }

    /**
     * Get member count by given clan object.
     *
     * @return integer
     */
    public function getMemberCount()
    {
        return $this->get('members');
    }

    /**
     * Get all the leaders by given clan object.
     *
     * @return Collection
     */
    public function getLeaders()
    {
        return $this->getMembers()->filter(
            function ($member, $key) {
                return $member->role == 'leader' || $member->role == 'coLeader';
            }
        );
    }
}
