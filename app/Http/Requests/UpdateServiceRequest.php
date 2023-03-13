<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
        $this->service ? $id = $this->service->id.',id' : $id  = '' ;

        return [
            'name' =>'required|string|max:100|unique:services,name,'.$id,
            'main_key_id' =>'required|integer|exists:main_keys,id',
            ];
    }
}
