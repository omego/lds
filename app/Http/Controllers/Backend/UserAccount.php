<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $msg = trans('base.user_account_updated');

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->newPassword)) {
            $user->password = Hash::make($request->newPassword);
            $msg .= ' ' . trans('base.password_updated');
        }
        $user->save();
        
		return redirect()->route('backend.account')
				->with('success', $msg);
    }
}
