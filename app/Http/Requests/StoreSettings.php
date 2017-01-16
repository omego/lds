<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettings extends FormRequest
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
        return [
			'slider_display_duration' => 'required|integer|min:0',
			'slider_transition_duration' => 'required|integer|min:0',
            'dock_show' => 'boolean',
        ];
    }
}
