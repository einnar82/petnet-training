<?php

namespace App\Http\Requests\API;

use App\Rules\API\CheckTokenIfExistRule;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'token' => ['required', new CheckTokenIfExistRule($this->email)],
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
