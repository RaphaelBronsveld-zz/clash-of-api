<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Objects;

use Illuminate\Support\Collection;

abstract class BaseObject extends Collection {
    /**
     * AbstractResponse constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->mapRelatives();
    }

    /**
     * Class relations.
     *
     * @return array
     */
    abstract public function relations();

    /**
     * Map property relatives to appropriate objects.
     *
     * @return array
     */
    public function mapRelatives()
    {
        $relations = collect($this->relations());

        if ($relations->isEmpty()) {
            return [];
        }

        return $this->items = collect($this->all())
            ->map(function ($value, $key) use ($relations) {
                if(is_int($key) && $relations->get('indexed')) {
                    if(is_array($value)) {
                        $className = $relations->get('indexed');

                        return new $className($value);
                    }
                }
                if ($relations->has($key)) {

                    $className = $relations->get($key);

                    return new $className($value);
                }

                return $value;
            })
            ->all();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->items[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->items[$key] = $value;
    }
}
