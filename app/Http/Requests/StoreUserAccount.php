<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserAccount extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();
        return [
			'name' => 'required|max:255|unique:users,name' . (isset($user) ? ','.$user->id : ''),
            'email' => 'required|max:255|unique:users,email' . (isset($user) ? ','.$user->id : ''),
        ];
    }
}
