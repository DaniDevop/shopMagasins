<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategorieRequest extends FormRequest
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
           'categorie'=>'required|string|unique:categories,categories',
           'status'=>'required',

        ];
    }



     /**
     * Get the messages .
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
           'categorie.required'=>'Le nom de la catégories est requis',
           'categorie.unique'=>'Le nom de la catégories existe déjà',
           'status.required'=>'Le status est requis',
        ];
    }
}
