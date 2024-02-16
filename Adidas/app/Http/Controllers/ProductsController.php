<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\products;
use Illuminate\Support\Facades\Storage;








class ProductsController extends Controller
{
    // public function product()
    // {
    //     return view('adidass.products');
    // }

    public function product()
    {
        $products = DB::table('products')->join('categories', 'products.cat_id', '=', 'categories.id')
                                            ->select('categories.name', 'products.*')
                                            ->paginate(4);
        $category = category::all();
        return view('adidass.admin.products',compact('products','category')); 

    }

    public function ajouter(){

        $categories = category::all();
        return view('adidass.admin.inputProduct',compact('categories'));
        
    }

    public function ajouter_Product(Request $request){

        // dd($request);

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'cat_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
        ]);

        $uploadFile = 'images/';
        $uploadFileName = uniqid(). '.' .$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move($uploadFile,$uploadFileName);
        
        
        
        $product = new products(); 
        $product->nom = $request->nom;
        $product-> description= $request->description; 
        $product-> prix = $request->prix; 
        $product->cat_id = $request->cat_id;
        $product-> image = $uploadFileName; 

        $product->save();
        
        // dd($product);

        return redirect('/products')->with('status','success');
    }


    public function delete_product($id)
    {
        $products = products::find($id);
        // dd($products);
        $products->delete();
        return redirect('/products');
    }


    public function fetch_all($id)
    {
        $products = products::find($id);
        $category = category::all();

        return view('adidass.admin.updateProduct',compact('products','category')); 

    }


    public function update_product(Request $request)
    {
                // dd($request);

                $request->validate([
                    'nom' => 'required',
                    'description' => 'required',
                    'prix' => 'required',
                    'cat_id' => 'required',
                    'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
                ]);
                

                $product = products::findOrFail($request->id);

                // $category = category::all();

                $product->nom = $request->nom;
                $product->description= $request->description; 
                $product->prix = $request->prix; 
                $product->cat_id = $request->cat_id;

                if ($request->hasFile('image')) {
                    $uploadFile = 'images/';
                    $uploadFileName = uniqid(). '.' .$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->move($uploadFile,$uploadFileName);
                    // dd($request);
                
                
                    if($product->image){
                        Storage::delete('images/' . $product->image);
                    } 

                $product->image = $uploadFileName; 
                
            }
                
                $product->save();
                
                // dd($product);
        
                return redirect('/products')->with('status','Product updated successfully');
    }

}
