<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class devInfosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'experience'=>['required','numeric','max:50'],
            'post' =>['required'],
            'kind' =>['required'],
            'bio' =>[''],
            'twitter'=>['unique:devinfos'],
            'linkedin' =>['unique:devinfos'],
            'github' =>['unique:devinfos'],
            'portfolio' => ['unique:devinfos']
        ];
    }
}
