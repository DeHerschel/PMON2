<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTarget extends FormRequest
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
            'targetName' => 'required|max:10|unique:targets,name,'.$this->target->id,
            'targetIp' => 'required|ip|unique:targets,IP,'.$this->target->id,
            'targetDom' => 'nullable|max:255',
            'targetMac' => 'nullable|mac_address|unique:targets,MAC,'.$this->target->id
        ];
    }
    public function attributes()
    {
        return [
            'targetIp' => 'IP',
            'targetMac' => 'target MAC'
        ];
    }
}