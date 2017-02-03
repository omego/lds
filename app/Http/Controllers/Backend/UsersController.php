<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;

class UsersController extends Controller
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
     * Show the users index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index', [
			'users' => User::get()
		]);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(StoreUser $request)
    {
		$msg = trans('base.user_created');
	
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		if (!empty($request->newPassword)) {
			$pw = Hash::make($request->newPassword);
		} else {
			$pw = str_random(10);
            $msg .= ' ' . trans('base.generated_password_is', [ 'password' => $pw ]);
		}
		$user->password = Hash::make($pw);
		$user->save();

		return redirect()->route('backend.users')
				->with('success', $msg);
    }

    public function edit(User $user)
    {
        return view('backend.users.edit', [
			'user' => $user
		]);
    }

    public function update(StoreUser $request, User $user)
    {
		$msg = trans('base.user_updated');

		$user->name = $request->name;
		$user->email = $request->email;
        if (!empty($request->newPassword)) {
            $user->password = Hash::make($request->newPassword);
            $msg .= ' ' . trans('base.password_updated');
        }
		$user->save();

		return redirect()->route('backend.users')
				->with('success', $msg);
    }

    public function destroy(User $user)
    {
		if ($user->id == Auth::id()) {
			return redirect()->route('backend.users')
						->withInput()
						->withErrors(trans('base.cannot_delete_own_user_account'));
		}	
		
		$user->delete();

		return redirect()->route('backend.users')
				->with('success', trans('base.user_deleted'));
    }
}
