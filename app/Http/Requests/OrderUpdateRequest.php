<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'client_email' => 'required|email',
            'partner_id' => 'required|exists:partners,id',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'status' => 'required|in:0,10,20',
        ];
    }

    public function messages()
    {
        return [
            'client_email.required' => 'Заполните email клиента',
            'client_email.email' => 'Email клиента должен быть валидным',
            'partner_id.required' => 'Выберите партнёра',
            'partner_id.exists' => 'Партнёр с таким ID не существует в базе',
            'products.*.id.required' => 'Выберите продукт',
            'products.*.id.exists' => 'Продукт с таким ID не существует в базе',
            'products.*.quantity.required' => 'Введите количество продуктов',
            'products.*.quantity.integer' => 'Количество продуктов должно быть целым числом',
            'products.*.quantity.min' => 'Количество продуктов не может быть меньше :min',
            'status.required' => 'Укажите статус',
            'status.in' => 'Статус не входит в список разрешённых',
        ];
    }
}
