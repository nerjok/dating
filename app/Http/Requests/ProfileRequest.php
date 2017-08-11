<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
           
                'username' => 'required|string',
                 'status'      => 'required|string',
                 'gender' => [
                                'required',
                                Rule::in(['male', 'female']),
                            ],
                 'lives' => 'required|string|max:40',
                  'bdate' => 'required|date',
                 'description'      => 'required|string',
                 'looks'=> 'required|string',
        ];
    }
}
