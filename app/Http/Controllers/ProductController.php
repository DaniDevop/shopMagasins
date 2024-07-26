<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    //


    public function index(){

        $productAll=Product::orderBy('id','DESC')->paginate(10);
        $categoriesAll=Categorie::all();

        return view('admin.product.index',[
            'productAll'=>$productAll,
            'categoriesAll'=>$categoriesAll

        ]);
    }


    public function store(AddProductRequest $request){

        $product=new Product();
        $product->designation=$request->designation;
        $product->prix=$request->prix;
        $product->categorie_id=$request->categorie_id;
        $product->stock=$request->stock;

        $image=$request->file('image');
        $imageName=time().'.'.$image->getClientOriginalExtension();

        $image->move('uploads/product',$imageName);
        $manager= new ImageManager(new Driver());
        $resizeImage=$manager->read('uploads/product/'.$imageName);
        $resizeImage->resize(250,250);
        $resizeImage->save(public_path('uploads/products/'.$imageName));
        $product->image=$imageName;
        Storage::delete('uploads/product/'.$imageName);
        $product->save();
        toastr()->success('Produit ajouté avec success !');
        return back();
    }


    public function edit($id){
        $product=Product::find($id);
        if(!$product){
            toastr()->error('Le produit n existe pas dans la base de données');
            return back();
        }
        $categoriesAll=Categorie::all();

        return view("admin.product.edit",[
            'product'=>$product,
            'categoriesAll'=>$categoriesAll

        ]);
    }

    public function update(UpdateProductRequest $request){
        $product=Product::find($request->id);

        $product->designation=$request->designation;
        $product->prix=$request->prix;
        $product->categorie_id=$request->categorie_id;
        $product->stock=$request->stock;

        if($request->hasFile('image')){

            $image=$request->file('image');
            $imageName=time().'.'.$image->getClientOriginalExtension();

            $image->move('uploads/product',$imageName);
            $manager= new ImageManager(new Driver());
            $resizeImage=$manager->read('uploads/product/'.$imageName);
            $resizeImage->resize(250,250);
            $resizeImage->save(public_path('uploads/products/'.$imageName));
            $product->image=$imageName;
            Storage::delete('uploads/product/'.$imageName);
        }

        $product->save();
        toastr()->success('Produit modifié avec success !!!');
        return back();
    }


}
