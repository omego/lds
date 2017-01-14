<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channel;

class FrontendController extends Controller
{
    /**
     * Show the list of channels.
     *
     * @return Response
     */
    public function index()
    {
        return view('frontend.index', [
			'channels' => Channel::get()
		]);
    }

    /**
     * Show the channel.
     *
     * @param  Channel  $channel
     * @return Response
     */
    public function showChannel(Channel $channel)
    {
        return view('frontend.channel', [
			'channel' => $channel
		]);
    }
}
