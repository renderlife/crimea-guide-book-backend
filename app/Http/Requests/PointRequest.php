<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
            'title'         => 'required|unique:points,title|string|min:1|max:255',
            'code'          => 'required|unique:points,code|alpha_dash|min:1|max:50',
            'coordinate'    => 'max:50',
            'city_id'       => 'numeric',
            'street'        => 'max:50',
            'house'         => 'max:10',
            'place'         => 'max:255',
            'author'        => 'max:255',
        ];
    }

    /**
     *
     */
    /*public function withValidator($validator){
        $validator->after(function ($validator) {
            $numbers = $this->except('_token'); // Get all inputs except '_token'
            $isValid = MyOwnClass::checkMathOperation($numbers);

            if(!$isValid) {
                $validator->errors()->add('number1', ' ');
                $validator->errors()->add('number2', ' ');
                $validator->errors()->add('number3', ' ');
                $validator->errors()->add('globalError', 'The numbers are not valid.');
            }
        });
    }*/
}
