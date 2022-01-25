<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
          'tags' => 'required',
          'category' => 'required',
          'sound' => 'required|mimes:mp3,wav,flac,wma|max:131072',
          'cover' => 'mimes:png,jpg|max:10240'
        ];
    }
}
