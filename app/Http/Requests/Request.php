<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
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

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'Morate biti ulogovani da bi ste se prijavili za dogadjaj',
            'event_id.unique:event-users,event_id,NULL,id,user_id,' => 'Već ste se prijavili na događaj',
            'image.required' => 'Niste izabrali sliku!',
            'image.image' => 'Izabrani fajl nije slika!'
        ];
        $validation = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages );;

    }

}
