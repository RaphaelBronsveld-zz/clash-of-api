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

class League extends BaseObject
{
    /**
     * Class relations.
     *
     * @return array
     */
    public function relations()
    {
        return [
            //'location'          => Location::class
        ];
    }

    /**
     * Return the icon url based on the type.
     * Types can be tiny, small or medium.
     *
     * @param string $type
     * @return string
     */
    public function getIcon($type = '')
    {
        return $this->get('iconUrls')[$type];
    }
}
