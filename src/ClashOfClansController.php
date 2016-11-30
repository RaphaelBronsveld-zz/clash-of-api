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
     * Example to be found at yoururl.com/clashofclans. For more
     * please check the examples.md file in the src folder.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clans = clash()->getClans(['name' => 'test',
                                    'limit' => '3']);

        return view('clashofapi::clans', compact('clans'));
    }
}
