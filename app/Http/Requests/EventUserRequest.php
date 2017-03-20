<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class EventUserRequest extends Request
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
        $rules = [

        ];

    }

    public function messages()
    {
        return [
            'user_id.required' => 'Morate biti ulogovani da bi ste se prijavili za dogadjaj',
            'event_id.unique:event-users,event_id,NULL,id,user_id,' => 'Već ste se prijavili na događaj',
        ];
    }
}
