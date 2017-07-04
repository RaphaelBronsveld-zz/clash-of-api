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
     *
     * @return Collection
     */
    public function getMembers()
    {
        return $this->has('memberList') ?
            $this->memberList : $this->generateInvalidMethodException();
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
        return (int)$this->get('members');
    }

    /**
     * Get all the leaders by given clan object.
     *
     * @return array
     */
    public function getLeaders()
    {
        return $this->getMembers()->filter(
            function ($member, $key) {
                return $member->role == 'leader' || $member->role == 'coLeader';
            }
        );
    }

    /**
     * // TODO: Refactor into custom exception
     */
    protected function generateInvalidMethodException()
    {
        throw new \InvalidArgumentException(
            'getMembers() on a Clan instance from a getClans method is invalid.'
        );
    }
}
