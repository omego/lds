<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlide;

use App\Slide;
use App\Channel;

class SlidesController extends Controller
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
     * Show the slides index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.slides.index', [
			'slides' => Slide::get()
		]);
    }

    public function edit(Slide $slide)
    {
        return view('backend.slides.edit', [
			'slide' => $slide,
			'channels' => Channel::getSelectorArray()
		]);
    }

    public function update(StoreSlide $request, Slide $slide)
    {
		$slide->name    = $request->name;
		$slide->content = $request->content;
		$slide->published = isset($request->published);
		$slide->background_color = $request->background_color;
		$slide->background_image = $request->background_image;
		$slide->channels()->sync($request->channels ?: []);
		$slide->save();

		return redirect()->route('backend.slides')
				->with('success', trans('ds.slide_updated') . ' <a href="' . route('frontend.slide', $slide) . '" target="_blank">' . trans('base.show') .'</a>');
    }

    public function publish(Slide $slide)
    {
		$slide->published = true;
		$slide->save();

		return redirect()->route('backend.slides')
				->with('success', trans('ds.slide_published'));
    }

    public function unpublish(Slide $slide)
    {
		$slide->published = false;
		$slide->save();

		return redirect()->route('backend.slides')
				->with('success', trans('ds.slide_unpublished'));
    }
}
