<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
           'designation'=>'required|string',
           'prix'=>'required',
           'categorie_id'=>'required|exists:categories,id',
           'image'=>'nullable|image|mimes:png,jpg,jpeg',
           'stock'=>'required|min:1',
           'id'=>'required|exists:products,id',
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
           'categorie_id.required'=>'La de la catégories est requis',
           'designation.unique'=>'Le produit existe déjà',
           'designation.required'=>'Le nom du produit est requis ',
           'prix.required'=>'Entrer le prix du produit',
           'image.mimes'=>'Le type de l image n est pas respecté',
           'categorie_id.exists'=>'La catégorie n existe plus !',
           'stock.required'=>'Veuillez rentré la quantité de produit',
           'stock.min'=>'Le stock doit etre superieure à 0',

        ];
    }
}
