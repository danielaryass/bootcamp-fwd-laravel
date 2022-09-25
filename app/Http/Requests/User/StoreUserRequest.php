<?php

namespace App\Http\Requests\User;
// use Gate;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            
            'email' => [
                'required', 'email','uniques:users', 'max:255','dns'
            ],
            'password' => [
                'min:8','string', 'max:255', 'mixedCase'
            ],
            // add validation for role this here 
        ];
        
    }
}
