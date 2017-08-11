<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
        protected $redirectRoute = 'profiles';
        

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
                    'ageFrom' => 'required|integer',
            
                    'ageTo' => 'required|integer',

                    'lives' => 'sometimes',

                    'gender' => 'required|array',
        ];
    }
}
