<?php

if (!function_exists('clash')) {
    /**
     * Get the Clash instance
     *
     * @return \Raphaelb\ClashOfApi\Clash
     */
    function clash()
    {
        return app('clash');
    }
}