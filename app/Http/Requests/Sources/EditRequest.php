<?php

namespace App\Http\Requests\Sources;

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
            'title' => ['required', 'string', 'min:2'],
			'site' => ['required', 'string', 'url', 'max:100']
        ];
    }
    public function messages(): array
	{
		return [
			'required' => 'Заполните обязательное поле :attribute',
            'url' => 'Поле :attribute имеет ошибочный формат URL.',
			'min' => [
				'string' => 'Количество символов в поле :attribute должно быть не меньше :min.'
			]
		];
	}

	public function attributes(): array
	{
		return [

            'title'  => 'Наименование источника',
			'site' => 'Адрес источника'
		];
	}
}
