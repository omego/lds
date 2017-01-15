<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Slide;

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

    /**
     * Show a slide.
     *
     * @param  Slide  Slide
     * @return Response
     */
    public function showSlide(Slide $slide)
    {
        return view('frontend.slide', [
			'slide' => $slide
		]);
    }
}
