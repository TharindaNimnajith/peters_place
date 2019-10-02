<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRoomTypeValidation extends FormRequest
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
            't_id' => 'exists:rooms,t_id|exists:reserves,t_id'
        ];
    }

    public function messages()
    {
        return [
            't_id.exists' => 'ERROR: Foreign key violation!',
        ];
    }
}
