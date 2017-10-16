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

use GuzzleHttp\Exception\ClientException;
use Raphaelb\ClashOfApi\Clash;

class ClashClassTest extends TestCase
{
    /** @test */
    public function correctInstanceGetsReturned()
    {
        $instance = new Clash();
        $this->assertInstanceOf(Clash::class, $instance);
    }

    /** @test */
    public function exceptionGetsThrownWithoutAccessToken()
    {
        $this->expectException(ClientException::class);
        $res = (new Clash())->sendRequest('GET', 'clans/');
    }
}
