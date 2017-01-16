<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlide extends FormRequest
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
			'name' => 'required|max:255',
			'content' => 'required',
			'published' => 'boolean',
			'date_from' => 'date',
			'date_to' => 'date|after:date_from',
			'background_color' => 'max:255',
			'background_image' => 'max:255',
        ];
    }
}
