<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChannel;

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

    public function create()
    {
        return view('backend.channels.create');
    }

    public function store(StoreChannel $request)
    {
		$channel = new Channel();
		$channel->name = $request->name;
		$channel->save();

		return redirect()->route('backend.channels')
				->with('success', trans('ds.channel_created'));
    }

    public function edit(Channel $channel)
    {
        return view('backend.channels.edit', [
			'channel' => $channel
		]);
    }

    public function update(StoreChannel $request, Channel $channel)
    {
		$channel->name = $request->name;
		$channel->save();

		return redirect()->route('backend.channels')
				->with('success', trans('ds.channel_updated'));
    }

    public function destroy(Channel $channel)
    {
		$channel->delete();

		return redirect()->route('backend.channels')
				->with('success', trans('ds.channel_deleted'));
    }
}
