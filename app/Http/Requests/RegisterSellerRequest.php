<?php

namespace App\Http\Requests;

use App\Models\RequestedUser;
use Illuminate\Foundation\Http\FormRequest;

class RegisterSellerRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'division_id' => ['required'],
            'district_id' => ['required'],
            'thana_id' => ['required'],
            'ward_no' => ['required'],
             'group_id' => ['required', 'numeric'],
            'mobile_number' => ['required', 'string', 'unique:' . RequestedUser::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . RequestedUser::class],
            'whats_app_number' => ['required'],
            'password' => ['required', 'min:6', 'max:100'],
            'confirm_password' => ['required', 'same:password'],
            'monitor_name' => ['required'],
            'monitor_number' => ['required'],
            'drector_name' => ['required'],
            'director_number' => ['required'],
        ];
    }
        public function messages()
    {
        return [
      
            'group_id.numeric' => 'Please select group name.',
        ];
    }
}
