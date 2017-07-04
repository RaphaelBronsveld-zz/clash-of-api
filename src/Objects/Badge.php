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

class Badge extends BaseObject
{
    /**
     * Class relations.
     *
     * @return array
     */
    public function relations()
    {
        return [
            //'badgeUrls'          => self::class
        ];
    }
}
