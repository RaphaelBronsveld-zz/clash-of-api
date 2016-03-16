<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi;

use App\Http\Controllers\Controller;


class ClashOfClansController extends Controller
{
    /**
     * index method
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Resolve from the container.
        $clans  = app()->make('clash')
                      ->getClans(['name' => 'Test',
                                  'limit' => '10']);

        return view('clashofapi::clans', compact('clans'));
    }
}
