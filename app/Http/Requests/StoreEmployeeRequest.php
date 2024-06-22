<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required',
            'phone' => 'required|max:13',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.unique' => 'email sudah terdaftar',
            'position.required' => 'posisi wajib diisi',
            'phone.required' => 'nomor telepon wajib diisi',
            'phone.max' => 'nomor telepon maksimal 13 karakter',
            'address.required' => 'alamat wajib diisi',
            'image.required' => 'foto wajib diisi',
            'image.image' => 'foto harus berupa gambar',
            'image.mimes' => 'foto harus berformat jpeg, png, jpg',
        ];
    }
}
