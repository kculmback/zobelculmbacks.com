<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RsvpRequest extends FormRequest
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
            'guests' => 'required|array|min:1',
            'guests.*.id' => 'required|int',
            'guests.*.rsvp' => 'required|boolean',
        ];
    }
}
