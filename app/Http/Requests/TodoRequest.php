<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
          'name' => ['required', 'string', 'min:3'],
          'content' => ['required', 'string'],
        ];
    }

    public function messages()
    {
      return [
        "name.required" => "名前を入力してください",
        "name.min" => "3文字以上で入力してください",
        "content.required" => "内容を入力してください"
      ];
    }
}
