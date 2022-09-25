<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
// use Gate;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
// this rule only at update request
use Illuminat\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //create middleware from kernel at here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            'email' => [
                'required', 'email', 'max:255','dns', Rule::unique('users')->ignore($this->user),
                // Rule unique only works for other record id
            ],
            'password' => [
                'min:8','string', 'max:255', 'mixedCase'
            ],
            // add validation for role this here 
        ];
    }
}
