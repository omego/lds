<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettings;

class SettingsController extends Controller
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
     * Show the application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.settings');
    }

    public function update(StoreSettings $request)
    {
		\Setting::set('slider_display_duration', $request->slider_display_duration);
		\Setting::set('slider_transition_duration', $request->slider_transition_duration);
        \Setting::set('style_slide_background_color', $request->style_slide_background_color);
        \Setting::set('style_slide_foreground_color', $request->style_slide_foreground_color);
        \Setting::set('style_slide_font_size', $request->style_slide_font_size);        
        \Setting::set('dock_show', isset($request->dock_show));
        \Setting::set('dock_background_color', $request->dock_background_color);
        \Setting::set('dock_foreground_color', $request->dock_foreground_color);
		\Setting::save();

		return redirect()->route('backend.settings')
				->with('success', trans('ds.settings_updated'));
    }
}
