<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channel;

class ChannelController extends Controller
{
    /**
     * Show the list of channels.
     *
     * @return Response
     */
    public function index()
    {
        return view('channel.index', [
			'channels' => Channel::get()
		]);
    }

    /**
     * Show the channel.
     *
     * @param  Channel  $channel
     * @return Response
     */
    public function show(Channel $channel)
    {
        return view('channel.show', [
			'channel' => $channel
		]);
    }
}
