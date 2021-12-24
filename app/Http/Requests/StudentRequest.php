<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'username' => 'required|string|max:50|unique:users',
            'name' => 'required|string|max:255',
            'nis' => 'string|max:50|unique:users',
            'kelas' => 'string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:18',
            'foto' => 'required|string',
        ];
    }
}
