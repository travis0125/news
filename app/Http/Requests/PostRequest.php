<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:191',
            'content' => 'required',
            'file_1' => 'max:8192',
            'file_2' => 'max:8192',
            'file_3' => 'max:8192'
        ];
    }

    public function attributes()
    {
        return [
            'file_1' => '附件1',
            'file_2' => '附件2',
            'file_3' => '附件3'
        ];
    }
}