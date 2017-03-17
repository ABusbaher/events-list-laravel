<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique',
            'role_id' => 'required',
            'is_active' => 'required'
        ];
    }
}
