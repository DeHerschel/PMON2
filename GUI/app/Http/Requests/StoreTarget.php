<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarget extends FormRequest
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
            'targetName' => 'required|max:10|unique:targets,name|alpha_dash',
            'targetIp' => 'required|ip|unique:targets,IP',
            'targetDom' => 'nullable|max:255',
            'targetMac' => 'nullable|mac_address|unique:targets,MAC'
        ];
    }
    public function attributes() {
        return [
            'targetIp' => 'IP',
            'targetMac' => 'target MAC'
        ];
    }
}
