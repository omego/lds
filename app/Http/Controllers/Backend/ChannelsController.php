<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Channel;

class ChannelsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the channels index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.channels.index', [
			'channels' => Channel::get()
		]);
    }
}
