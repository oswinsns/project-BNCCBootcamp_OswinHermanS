<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function apiGetCategory(){
        $categories = Category::with('barang')->get();
        // $categories = Category::with('buku')->get();
        // return $categories;

        return $categories;
    }

    public function apiCreateCategory(Request $request){
        Category::create([
            'name' => $request->name,
        ]);

        return 'sucess create';
    }

    public function apiUpdateCategory(Request $request, $id){

        $category = Category::find($id);

        $category->update([
          'name'=> $request->name,
        ]);

        return 'sucess update';
    }

    public function apiDeleteCategory($id){

        Category::destroy($id);

        return 'sucess delete';
    }

}
