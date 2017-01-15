<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Slide;

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
			'slide' => $slide
		]);
    }

    public function update(Request $request, Slide $slide)
    {
		$slide->name    = $request->name;
		$slide->content = $request->content;
		$slide->save();

		return redirect()->route('backend.slides')
				->with('success', trans('ds.slide_updated'));
    }
}
