<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiveCashRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'receive_date' => 'required|date',
            'finish_date' => 'required|date|after_or_equal:receive_date',
            'search' => 'required|string',
            'client_id' => 'required|exists:clients,id',
            'material_id.*' => 'required|exists:materials,id',
            'height.*' => 'required|numeric|min:0',
            'width.*' => 'required|numeric|min:0',
            'quantity.*' => 'required|integer|min:1',
            'price.*' => 'required|numeric|min:0',
            'service_price' => 'required|numeric|min:0',
            'type' => 'required|in:cash,online',
            'paid_amount' => 'required|numeric|min:0',
            'remaining_amount' => 'required|numeric|min:0',
        ];
    }
}