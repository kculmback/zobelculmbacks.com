<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongsRequest extends FormRequest
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
            'songs.*.name' => 'required|string',
            'songs.*.artist' => 'required|string',
            'invite_id' => 'nullable|integer',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'songs.*.name.required' => 'Song name is required!',
            'songs.*.name.string' => 'Song name should be a string!',
            'songs.*.artist.required' => 'Song artist is required!',
            'songs.*.artist.string' => 'Song artist should be a string!',
        ];
    }
}
