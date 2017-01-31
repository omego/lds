<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAccount;
use Illuminate\Support\Facades\Auth;

class UserAccount extends Controller
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
        return view('backend.account', [
           'user' => Auth::user()
        ]);
    }

    public function update(StoreUserAccount $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
		return redirect()->route('backend.account')
				->with('success', trans('ds.settings_updated'));
    }
}
