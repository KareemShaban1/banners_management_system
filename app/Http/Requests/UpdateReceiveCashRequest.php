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
            'material_id' => 'required|exists:materials,id',
            'user_id' => 'nullable|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'finish_date' => 'required|date',
            'service_price' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
            'description' => 'nullable',
            'type' => 'required',
            'height' => 'nullable|string',
            'width' => 'nullable|string',
            'quantity' => 'nullable|string',
        ];
    }
}
