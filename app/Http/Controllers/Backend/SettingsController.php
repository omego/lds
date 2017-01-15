<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
	
    public function update(Request $request)
    {
		//$request->slide_display_duration
		//$request->slide_transition_duration
		
		return redirect()->route('backend.settings')
				->with('success', trans('ds.settings_updated'));
    }
}
