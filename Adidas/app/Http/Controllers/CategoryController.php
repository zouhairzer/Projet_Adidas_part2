<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\products;

class CategoryController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->join('categories', 'products.cat_id', '=', 'categories.id')
                                            ->select('categories.name as cat_name', 'products.*')
                                            ->get();
        return view('adidass.index',compact('products'));
        
    }


    
    public function category()
    {
        $categories = category::paginate(3);
        return view('adidass.admin.category',compact('categories'));   
    }

    public function ajouter(){

        return view('adidass.admin.inputCategory');
        
    }



    public function ajouter_categories(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();

        return redirect('/category')->with('status','success');
    }

    
    public function fetch_categories($id)
    {
        $categories = Category::find($id);

        return view('adidass.admin.updateCategory',compact('categories'));
    }


    public function update_categories(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $cat = Category::find($request->id);
        $cat->name = $request->name;
        $cat->update();

        return redirect('/category')->with('status','success');
    }
    

    
    public function delete_categories($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('status', 'success');
    }

}















