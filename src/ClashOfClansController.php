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
       $client = new Clash();
       $clans = $client->getClans([
           'name' => 'K!ngs Throne',
           'limit' => '5'
       ]);

        // Resolve from the container.
        $client2 = app()->make('clash')
                        ->getClan('RJVPRCQ');

        // Facade way.
        $client3 = \Clash::getClans([
            'name' => 'Test',
            'limit' => '29'
        ]);

        return view('clashofapi::clans', compact('clans'));
    }
}
