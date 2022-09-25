<?php

namespace App\Http\Requests\Role;
// use Gate;
use App\Models\ManagementAcces\Role;
use Symfony\Component\HttpFoundation\Response;
// this rule only at update request
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'title' => [
                'required', 'string', 'max:255', Rule::unique('role')->ignore($this->role),
            ],
        ];
    }
}