<?php
/**
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Tests;

use Raphaelb\ClashOfApi\Objects\Clan;
use Raphaelb\ClashOfApi\Exceptions\NoMemberListException;

class ClanTest extends TestCase
{
    /** @test */
    public function itWillThrowAnExceptionWithNoMemberList()
    {
        $this->expectException(NoMemberListException::class);

        $clan = (new Clan([]))->getMembers();
    }
}
