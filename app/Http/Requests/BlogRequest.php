<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends FormRequest
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
        return [
            'title' => 'required|min:2|max:40|unique:blogs',
            'summary' => 'required|min:1|max:255|unique:blogs',
            'content' => 'required|min:1|unique:blogs',
            'can_comment' => 'nullable|boolean',
            'cover_url' => 'nullable|url',
            'is_anonymous' => 'nullable|boolean',
            'reading_time' => 'nullable|integer',
        ];
    }
}
