<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $rules =  [
            'name' => 'required|max:100',
            'contact' => 'required|numeric',
            'position_id' => 'required',
        ];

        if(request()->method() == 'POST'){

            $rules['email'] = 'required|email:rfc,dns|unique:employees,email,NULL,id,deleted_at,NULL';
        }

        if(request()->method() == 'PUT'){

            $rules['email'] = 'required|email:rfc,dns|unique:employees,email,'. request()->route('employee')->id ;

        }

        return $rules;
    }
}
