<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UserRequest extends FormRequest
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

            
            'fullname' => 'required|max:100',
            //Excluye el id si se esta actualizando ese id
            'username' => 'required|max:100|unique:users,username,' . $this->route('id'),
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'confirm_email' => 'required|email|same:email',
            'file'=> ['nullable', File::image()->max(10*1024)],
            'password' => 'nullable|min:8|confirmed',
            'social_facebook' => 'nullable|max:100',
            'social_twitter' => 'nullable|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fullname.required' => 'El campo Nombre completo es obligatorio.',
            'fullname.max' => 'El campo Nombre completo no debe tener más de :max caracteres.',
            'username.required' => 'El campo Nombre de usuario es obligatorio.',
            'username.max' => 'El campo Nombre de usuario no debe tener más de :max caracteres.',
            'username.unique' => 'El Nombre de usuario ya está en uso.',
            'email.required' => 'El campo Correo electrónico es obligatorio.',
            'email.email' => 'El Correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El Correo electrónico ya está en uso.',
            'confirm_email.required' => 'El campo Confirmar correo electrónico es obligatorio.',
            'confirm_email.email' => 'El campo Confirmar correo electrónico debe ser una dirección válida.',
            'confirm_email.same' => 'El Correo electrónico y la Confirmación de correo electrónico no coinciden.',
            'file.image' => 'El archivo seleccionado debe ser una imagen válida.',
            'file.max' => 'El tamaño máximo permitido para la imagen es de :max kilobytes.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'La Contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'La Contraseña y la Confirmación de contraseña no coinciden.',
            'social_facebook.max' => 'El campo Usuario de Facebook no debe tener más de :max caracteres.',
            'social_twitter.max' => 'El campo Usuario de Twitter no debe tener más de :max caracteres.',
        ];
    }
}