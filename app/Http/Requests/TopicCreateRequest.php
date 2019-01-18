<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "title" => "required|max:100",
            "body" => "required|max:255",
        ];
    }
}
