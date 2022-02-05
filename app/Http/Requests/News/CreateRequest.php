<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
			'title' => ['required', 'string', 'min:5'],
			'author' => ['required', 'string', 'min:2'],
			'status' => ['required', 'string'],
			'image' => ['nullable', 'file', 'image', 'mimes:jpg,png'],
			'description' => ['nullable', 'string', 'max:1000'],
			'display' => ['nullable', 'boolean']
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

            'category_id' => 'Категория',
            'title'  => 'Наименование',
			'author' => 'Автор',
            'status' => 'Статус',
            'description' => 'Описание'
            
		];
	}
}
