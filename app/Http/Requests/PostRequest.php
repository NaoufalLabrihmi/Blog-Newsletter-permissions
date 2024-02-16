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
        if (request()->isMethod('patch')) {
            return [
                'title' => 'required|min:3|max:50',
                'overview' => 'required',
                'description' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:512|dimensions:max_width=1000,max_height=1000',
                'images' => 'nullable|array|min:2|max:9',
                'images.*' => 'mimes:jpeg,jpg,png|max:1024',
            ];
        } else {
            return [
                'title' => 'required|min:3|max:50',
                'overview' => 'required',
                'description' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:512|dimensions:max_width=1000,max_height=1000',
                'images' => 'nullable|array|min:2|max:9',
                'images.*' => 'mimes:jpeg,jpg,png|max:1024',
            ];
        }
    }
}
