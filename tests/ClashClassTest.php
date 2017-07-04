<?php
/**
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi;

use Orchestra\Testbench\TestCase;

class ClashClassTest extends TestCase
{
    public function testBasicInstance()
    {
        $instance = new Clash();
        $this->assertInstanceOf(Clash::class, $instance);
    }
}