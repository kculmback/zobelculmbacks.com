<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StripeRequest extends FormRequest
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
            'amount' => 'required|integer',
            'gift' => ['required', 'string', Rule::in(['honeymoon', 'house', 'other'])],
            'other' => 'nullable|string|required_if:gift,other',
            'note' => 'nullable|string',
        ];
    }
}
