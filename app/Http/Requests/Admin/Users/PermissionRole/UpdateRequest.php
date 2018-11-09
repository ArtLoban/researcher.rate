<?php

namespace App\Http\Requests\Admin\Users\PermissionRole;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'permission_id' => 'nullable|array',
            'permission_id.*' => 'integer',
        ];

        return $rules;
    }
}
