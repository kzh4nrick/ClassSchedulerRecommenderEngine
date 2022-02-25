<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            'Subject_Code' => 'required|string|max:1000',
            'Subject_Name' => 'required|string|max:1000',
            'Subject_Type' => 'nullable|string',
            'Units' => 'required|tinyInteger'
        ];
    }
}
