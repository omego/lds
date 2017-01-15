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
		\Setting::save();

		return redirect()->route('backend.settings')
				->with('success', trans('ds.settings_updated'));
    }
}
