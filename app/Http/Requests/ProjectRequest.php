<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:3',
            'client_name' => 'required|max:255|min:3',
            'summary' => 'required',
            'cover_image' => 'nullable|image|max:3200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'il nome del progetto è un campo richiesto',
            'name.max' => 'il nome del progetto può avere al massimo :max caratteri',
            'name.min' => 'il nome del progetto può avere al massimo :min caratteri',
            'client_name.required' => 'il nome del cliente è un campo richiesto',
            'client_name.max' => 'il nome del progetto può avere al massimo :max caratteri',
            'client_name.min' => 'il nome del progetto può avere al massimo :min caratteri',
            'summary.required' => 'il nome del progetto è un campo richiesto',
            'cover_image.image' => 'il file immagine non è corretto',
            'cover_image.max' => 'il file immagine deve essere al massimo di 3mb'
        ];
    }
}
