<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Categorie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategorieController extends Controller
{


    public function categories():View{

        $categoriesAll=Categorie::orderBy('id','DESC')->paginate(10);
        return view('admin.categories.index',[
            'categorieAll'=>$categoriesAll
        ]);
    }


    public function addCategorie(AddCategorieRequest $request){

        $categorie=Categorie::create([
            'categories'=>$request->categorie,
            'status'=>$request->status
        ]);

        toastr()->success('Catégorie ajouté avec success !.');
        return back();

    }


    public function edit($id){

        $categorie=Categorie::find($id);
        if(!$categorie){
            flash()->error('Catégorie est inexistante !.');
            return back();
        }

        return view('admin.categories.edit',[
            'categorie'=>$categorie
        ]);
}

public function update(UpdateCategorieRequest $request){
    $categorie=Categorie::find($request->id);
    if(!$categorie){
        flash()->error('Catégorie est inexistante !.');
        return back();
    }
    $categorie->categories=$request->categorie;
    $categorie->status=$request->status;

    $categorie->save();
    toastr()->info('Catégorie est mise à jour avec success !');
    return back();
}
}
