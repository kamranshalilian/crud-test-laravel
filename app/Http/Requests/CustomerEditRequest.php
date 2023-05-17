<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LVR\CreditCard\CardNumber;
use Illuminate\Validation\Rule;

class CustomerEditRequest extends FormRequest
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
            "first_name" => [
                "required",
                Rule::unique('customers')->where(function ($query) {
                    return $query->where('last_name', $this->last_name)
                        ->where('date_of_birth', $this->date_of_birth)
                        ->where('first_name', $this->first_name);
                })->ignore($this->route('customer'))
            ],
            "last_name" => [
                "required",
                Rule::unique('customers')->where(function ($query) {
                    return $query->where('first_name', $this->first_name)
                        ->where('date_of_birth', $this->date_of_birth)
                        ->where('last_name', $this->last_name);
                })->ignore($this->route('customer'))
            ],
            "date_of_birth" => [
                "required",
                Rule::unique('customers')->where(function ($query) {
                    return $query->where('first_name', $this->first_name)
                        ->where('last_name', $this->last_name)
                        ->where('date_of_birth', $this->date_of_birth);
                })->ignore($this->route('customer'))
            ],
            "phone_number" => ["required", "phone:US,IR"],
            "email" => ["required", "email"],
            "bank_account_number" => [
                "required",
                 new CardNumber
            ],
        ];
    }
}
