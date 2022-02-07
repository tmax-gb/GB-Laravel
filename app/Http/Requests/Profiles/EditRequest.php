<?php

namespace App\Http\Requests\Profiles;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email','max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['required'],
            'newPassword' => ['required', 'string', 'min:8']
            ];
    }
    public function messages(): array
	{
		return [
			'required' => 'Заполните обязательное поле :attribute',
			'min' => [
				'string' => 'Количество символов в поле :attribute должно быть не меньше :min.'
			]
		];
	}

	public function attributes(): array
	{
		return [
            'name' => 'имя',
            'newPassword' => 'новый пароль'
        ];
	}
}
